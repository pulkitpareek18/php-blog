<?php
// Connecting Database
include "dbconnect.php";
include "activities/variables.php";
include "functions.php";
// Creating Some Variables
$category_id;
$category_name;
$player_video_id;
$player_url;
$player_title;
$hidden;
$content;
$meta_description;
$meta_keywords;
$meta_image;
// Validating Slug
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    // selecting row where slug matches
    $sql = "SELECT * FROM `playlist` WHERE `slug`='$slug'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    // if row found then fetching category id of video
    $no = 1;
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_name = $row['category_name'];
            $player_video_id = $row['id'];
            $player_url = $row['player_url'];
            $player_title = $row['title'];
            $hidden = $row['hidden'];
            $content = $row['content'];
            $meta_description = $row['meta_description'];
            $meta_keywords = $row['meta_keywords'];
            $thumbnail = $row['thumbnail'];
            if (isValidURL($thumbnail)) {
                $meta_image = $thumbnail;
            } else {
                if (isYtUrl($player_url)) {
                    $meta_image = YtLinkToThumbnail($player_url);
                } else {
                    $meta_image="";
                }
            }
        }
            
        
    }
        if ($hidden == 1) {
            // if video hidden then make some variables blank
            $player_url = "";
            $player_title = "This video is hidden by Admin";
        }
    } else {
        $player_title = "";
        $player_url = "";
        $category_id = "";
        $content = "";
        $hidden = "";
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
    <meta property="og:image" content="<?php echo $meta_image; ?>" />
    <meta property="og:title" content="<?php echo $player_title; ?>" />
    <meta property="og:url" content="<?php echo $home_url . $slug; ?>" />
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/design.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/responsive.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/prism.css">
    <style>
        <?php 
        if($hidden==0){
    // If Not Hidden and player url is empty then it is a blogpost so hiding player and playlist will be automatically hidden as there is no category
    if (empty($player_url)) {
        echo'
        #videoPlayer{
        display: none;}
        #arrowWithPlaylist{
        margin-top: 2vw;}';
    } 
        }?>
        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .pace-inactive {
            display: none
        }

        .pace .pace-progress {
            background: #102a9b;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: 3px
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <title><?php echo $player_title; ?></title>
    <link rel="shortcut icon" href="<?php echo $home_url ?>img/logo.png" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <?php include "includes/header.php"; ?>
    <!-- Video Section -->
    <div id="videoPlayer" class="flex-center">

        <div class="flex-center embed-responsive embed-responsive-16by9">
            <iframe class="flex-center embed-responsive-item" id="player" src="<?php echo $player_url ?>" allowfullscreen></iframe>
            <!-- Video Title -->

            <h1><?php echo $player_title ?></h1>
        </div>

    </div>
    <div id="arrowWithPlaylist" class="arrowWithPlaylist">

        <!-- Left Scroll  -->

        <div class="scrollBtn" id="scrollLeft">
            <img src="<?php echo $home_url; ?>img/left-arrow.png" alt="">
        </div>
        <!-- Playlist -->
        <div id="playlist" class="playlist">

            <?php
            if (!empty($category_id)) {
                // fetching all videos related to that category id
                if ($hidden == 0) {
                    // If video is not hidden then displaying all videos in playlist which are not hidden
                    $sql_playlist = "SELECT * FROM `playlist` WHERE `category_id`='$category_id' AND `hidden`=0 order by id ASC";
                    
                } else {
                    // If by chance someone got a hidden video link then displaying all videos which are hidden and unhidden, otherwise if we use the above sql query with hidden=0 our video will not appear in playlist
                    $sql_playlist = "SELECT * FROM `playlist` WHERE `category_id`='$category_id' order by id ASC";
                    
                }
                $result_playlist = mysqli_query($conn, $sql_playlist);

                // displaying all those videos in playlist
                $index = 0;
                $selected_video_index;
                while ($row_playlist = mysqli_fetch_assoc($result_playlist)) {

                    $title = $row_playlist['title'];
                    $video_url = $row_playlist['player_url'];
                    $video_id = $row_playlist['id'];
                    $slug = $row_playlist['slug'];
                    $thumbnail = $row_playlist['thumbnail'];
                    $image_source;
                    if (strlen($title) > 60) {
                        $title = substr($title, 0, 60) . '...';
                    }
                    if (isValidURL($thumbnail)) {
                        $image_source = $thumbnail;
                    } else {
                        if (isYtUrl($video_url)) {
                            $image_source = YtLinkToThumbnail($video_url);
                        } else {
                            $image_source = $home_url . "img/thumbnail.jpg";
                        }
                    }
                    if ($video_id == $player_video_id) {
                        $selected_video_index = $index;
                        echo '  <a href="' . $home_url . "play/" . $slug . '">
                            <li class="videos selected">
                            <img src="' . $image_source . '" alt="">
                            <p>' . $title . '</p>
                            </li></a>';
                    } else {

                        echo '   <a href="' . $home_url . "play/" . $slug . '">
                            <li class="videos">
                            <img src="' . $image_source . '" alt="">
                            <p>' . $title . '</p>
                            </li></a>';
                    }
                    $index++;
                }
            }
            ?>

        </div>
        <!-- Right Scroll -->
        <div class="scrollBtn" id="scrollRight">
            <img src="<?php echo $home_url; ?>img/right-arrow.png" alt="">
        </div>

    </div>
    <?php if(!empty($content)){
        echo'<div class="content container">
                    '.$content.'
            </div>';
    } ?>
    
    <script src="<?php echo $home_url; ?>js/jquery.js"></script>
    <script src="<?php echo $home_url; ?>js/operations.js"></script>
    <script src="<?php echo $home_url; ?>js/prism.js"></script>
    <script>
    <?php if(!empty($selected_video_index)){
        if($selected_video_index != 0) {
            echo'
            const selectedVideo = document.getElementsByClassName("videos")['.$selected_video_index .'];
            playlist.scrollLeft = selectedVideo.offsetLeft;';
        }
    }
        ?>

    </script>

</body>

</html>