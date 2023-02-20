<?php
include "../activities/variables.php";
include "../dbconnect.php";
// Insert Video
if (isset($_POST['title'])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $thumbnail_url = $_POST["imageUrl"];
    //TO INSERT ANY TYPE OF CONTENT LIKE SOURCE CODE
    $content = mysqli_real_escape_string($conn, $content);
    $category = $_POST["catid"];
    $slug = $_POST["slug"];
    $url = $_POST["url"];
    $meta_description = $_POST["description"];
    $meta_keywords = $_POST["keywords"];
    $hidden = $_POST["hidden"];
    $url = str_replace("watch?v=", "embed/", $url);
            if(empty($category)){ 
            // Sql query to be executed
            $sql = "INSERT INTO `playlist` (`title`, `content` , `slug`, `player_url` , `meta_description` , `meta_keywords` , `thumbnail` , `hidden`) VALUES ('$title', '$content' , '$slug', '$url' , '$meta_description' , '$meta_keywords' , '$thumbnail_url', '$hidden')";
            }else
            {
                $sql = "SELECT * FROM `category` where category_id = $category";
                $result = mysqli_query($conn, $sql);
                $row_category = mysqli_fetch_assoc($result);
                $cat_name = $row_category['category_name'];
                // Sql query to be executed
                $sql = "INSERT INTO `playlist` (`title`, `content` , `category_id` , `slug` , `category_name` , `player_url` , `meta_description` , `meta_keywords` , `thumbnail` , `hidden`) VALUES ('$title', '$content' , '$category' , '$slug' , '$cat_name' , '$url' , '$meta_description' , '$meta_keywords' , '$thumbnail_url', '$hidden')";
            }
    $result = mysqli_query($conn, $sql);
    if ($result) 
        {
            echo "done";
        } 
    else 
        {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
}

// Update Video

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_edit'])) {
        // Update the record
        $id = $_POST["id_edit"];
        $title = $_POST["title_edit"];
        $content = $_POST["content"];
        $content = mysqli_real_escape_string($conn, $content);
        $slug = $_POST["slug"];
        $category = $_POST["catid"];
        $meta_description = $_POST["description"];
        $meta_keywords = $_POST["keywords"];
        $url = $_POST["url"];
        $thumbnail = $_POST["imageUrl"];
        $url = str_replace("watch?v=", "embed/", $url);
        $hidden = $_POST["hidden"];
            if(empty($category))
            {  
                // Sql query to be executed
                $sql = "UPDATE `playlist` SET `title` = '$title' , `slug` = '$slug' , `content` = '$content' , `category_id` = '' , `category_name` = '' , `player_url` = '$url' , `meta_description` = '$meta_description' , `meta_keywords` = '$meta_keywords' , `thumbnail` = '$thumbnail', `hidden` = '$hidden' WHERE `playlist`.`id` = $id";
            }
            else
            {   
                $sql = "SELECT * FROM `category` where `category_id` = $category";
                $result = mysqli_query($conn, $sql);
                $row_category = mysqli_fetch_assoc($result);
                $category_name = $row_category['category_name'];
                // Sql query to be executed
                $sql = "UPDATE `playlist` SET `title` = '$title' , `slug` = '$slug' , `content` = '$content' , `category_id` = '$category' , `category_name` = '$category_name' , `player_url` = '$url' , `meta_description` = '$meta_description' , `meta_keywords` = '$meta_keywords' , `thumbnail` = '$thumbnail', `hidden` = '$hidden' WHERE `playlist`.`id` = $id";
            }
            
        $result = mysqli_query($conn, $sql);
        if ($result) 
        {
            echo "Done";
            header('Location: index.php');
            exit();
        } 
        else
        {
            echo "We could not update the record successfully" . mysqli_error($conn);
        }
    }
}

// Hide Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['hide'])) {
        $id = $_POST['hide'];
        $sql = "UPDATE `playlist` SET `hidden` = 1 WHERE `playlist`.`id` = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Hidden Successfully";
        }else{
            echo "We could not update the record successfully" . mysqli_error($conn);
        }
    }
}


// Un-Hide Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['unhide'])) {
        $id = $_POST['unhide'];
        $sql = "UPDATE `playlist` SET `hidden` = 0 WHERE `playlist`.`id` = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Un-Hidden Successfully";
        }else{
            echo "We could not update the record successfully" . mysqli_error($conn);
        }
    }
}


// Hide Playlist
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['hidePlaylist'])) {
        $id = $_POST['hidePlaylist'];
        $sql = "UPDATE `category` SET `hidden` = 1 WHERE `category`.`category_id` = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Hidden Successfully";
        }else{
            echo "We could not update the record successfully" . mysqli_error($conn);
        }
    }
}
// Un-Hide Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['unhidePlaylist'])) {
        $id = $_POST['unhidePlaylist'];
        $sql = "UPDATE `category` SET `hidden` = 0 WHERE `category`.`category_id` = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Un-Hidden Successfully";
        }else{
            echo "We could not update the record successfully" . mysqli_error($conn);
        }
    }
}

// Create Playlist


if (isset($_POST['playlist'])) {
    $playlist_name = $_POST['playlist'];
    $playlist_desc = $_POST['description'];
    // $playlist_url = $_POST['url'];
    $image_url = $_POST['img'];
    $hidden = $_POST['hidden'];
    $sql_pl = "INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `image_url` , `hidden`) VALUES (NULL, '$playlist_name', '$playlist_desc' , '$image_url' ,'$hidden')";
    $result_pl = mysqli_query($conn, $sql_pl);
    if ($result_pl) {
      echo "Playlist Created Successfully";
    } else {
        echo "We could not update the record successfully" . mysqli_error($conn);
    }
  }
