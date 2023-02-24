<?php
include "loginCheck.php";
include "backend.php";
if(isset($_GET["playlist_id"])){
// Playlist ID
$playlist_id = $_GET["playlist_id"];


        function format_description($description) {
            // detect and replace URLs
            $description = preg_replace_callback('/(https?:\/\/[^\s]+)/i', function($matches) {
                $url = $matches[0];
                $text = $url;
                if (strlen($text) > 40) {
                    $text = substr($text, 0, 40) . '...';
                }
                return '<a href="' . $url . '" target="_blank">' . $text . '</a>';
            }, $description);
            $description = nl2br($description); // convert new lines to <br> tags
            return $description;
        }
        

        function slugify($string) {
            // Convert string to lowercase
            $string = strtolower($string);
            
            // Replace special characters with hyphens
            $string = preg_replace('/[^a-z0-9]+/', '-', $string);
            
            // Remove hyphens at beginning and end of string
            $string = trim($string, '-');
            
            // Return slug
            return $string;
        }
        


        // Connect to database
        include "../dbconnect.php";

        // Set API key
        $api_key = 'AIzaSyAvYnrgfJViKRHhXK2ghdVkpcxj6REwivs';

        // Set up API request
        $url = 'https://www.googleapis.com/youtube/v3/playlistItems';
        $params = array(
        'part' => 'snippet',
        'playlistId' => $playlist_id,
        'maxResults' => 50,
        'key' => $api_key
        );
        $next_page_token = '';
        $videos = array();

        // Loop through pages of playlist items
        while (true) {
        // Add page token to params
        if (!empty($next_page_token)) {
            $params['pageToken'] = $next_page_token;
        }

        // Make API request and decode JSON response
        $api_url = $url . '?' . http_build_query($params);
        $response = file_get_contents($api_url);
        $data = json_decode($response);

        // Loop through videos on current page
        foreach ($data->items as $item) {
            $videos[] = $item;
        }

        // Check if there are more pages
        if (!empty($data->nextPageToken)) {
            $next_page_token = $data->nextPageToken;
        } else {
            break;
        }
        }

        // Get playlist name
        $playlist_name = $videos[0]->snippet->title;

        // Get playlist thumbnail
        $thumbnail_url = $videos[0]->snippet->thumbnails->maxres->url;

        // Get name of first video
        $first_video_name = $videos[0]->snippet->title; 
        $category_slug = slugify($first_video_name);// Will use this as category url, this will take user to the first video

        // Insert Category Information
        $category_position = incrementCategoryPosition();
        $sql = "INSERT INTO category (category_name, category_slug, image_url, position) VALUES ('$playlist_name', '$category_slug', '$thumbnail_url' , '$category_position')";

        mysqli_query($conn, $sql);

        // Find category id of Playlist
        $sql = "SELECT * FROM `category` WHERE `category_name` = '$playlist_name' ORDER BY `category_name` ASC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_name = $row['category_name'];
        }

        // Loop through videos and insert into database
        foreach ($videos as $item) {
        $video_id = $item->snippet->resourceId->videoId;
        $title_raw = $item->snippet->title;
        $title = mysqli_real_escape_string($conn, $item->snippet->title);
        $description = mysqli_real_escape_string($conn, $item->snippet->description);
        $thumbnail_url = $item->snippet->thumbnails->medium->url;
        $description = $item->snippet->description;
        $description = "<p>".format_description($description)."</p>";
        $slug = slugify($title);

        if($title_raw == "Private video"){
            continue; //Do Nothing
        } 
        else{
            $new_position = incrementVideoPosition($category_id);
            $sql = "INSERT INTO playlist (title, category_id, slug, category_name, player_url, thumbnail, content, position) VALUES ('$title', '$category_id', '$slug', '$category_name', 'https://www.youtube.com/embed/$video_id', '$thumbnail_url', '$description', '$new_position') ON DUPLICATE KEY UPDATE title='$title', category_id='$category_id', slug='$slug', category_name='$category_name', player_url='https://www.youtube.com/embed/$video_id', thumbnail='$thumbnail_url', content='$description'";
            mysqli_query($conn, $sql);
        }
        
        }

        // Close database connection
        mysqli_close($conn);
        echo"Playlist Import Done";

    }
    else{echo"No Playlist ID";}
?>