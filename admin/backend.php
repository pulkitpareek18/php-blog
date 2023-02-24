<?php
include "loginCheck.php";
include "../includes/variables.php";
include "../dbconnect.php";

/*
Special Function that reutrns maximum position value of videos with increment
 */

//Increment Video Position
function incrementVideoPosition($category_id)
{
    //If unlisted Video
    if ($category_id == "") {
        return 1;
    } else {
        include "../dbconnect.php";
        $sql = "SELECT * FROM `playlist` WHERE `playlist`.`category_id`=$category_id";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // Normal Case
            return $num + 1;
        } else {
            // If first video
            return 1;
        }
    }
}

/*
Special Function that reutrns current category id from id
 */

//Get current Category Id
function getCurrentCategoryId($id)
{
    include "../dbconnect.php";
    $sql = "SELECT * FROM `playlist` where `playlist`.`id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['category_id'];
}

/*
Special function that sorts videos on any change so that there will be no missing value in position
 */

//Sort Video On Any Change

function sortVideoOnChange($category_id)
{
    include "../dbconnect.php";
    if ($category_id != "") {
        $sql_pl = "SELECT * FROM `playlist` WHERE `category_id`= $category_id ORDER BY `position` ASC";
        $result_pl = mysqli_query($conn, $sql_pl);
        $num_pl = mysqli_num_rows($result_pl);
        $index = 1;
        if ($num_pl > 0) {
            while ($pl_row = mysqli_fetch_assoc($result_pl)) {
                $playlist_id = $pl_row['id'];
                $sql_new = "UPDATE `playlist` SET `position` = '$index' WHERE `id` = $playlist_id";
                mysqli_query($conn, $sql_new);
                $index++;
            }
        }
    }
}

/*
Special Function that reutrns maximum position value of categories with increment
 */

//Increment Category Position
function incrementCategoryPosition()
{
    include "../dbconnect.php";
    $sql = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        // Normal Case
        return $num + 1;
    } else {
        // If first Category
        return 1;
    }
}

/*
Special function that sorts categories on Deletion so that there will be no missing value in position
 */

//Sort Category On Deletion
function sortCategoryOnDeletion()
{
    include "../dbconnect.php";

    $sql = "SELECT * FROM `category` ORDER BY `position` ASC";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $index = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $sql_new = "UPDATE `category` SET `position` = '$index' WHERE `category_id` = $category_id";
            $result_new = mysqli_query($conn, $sql_new);
            $index++;
        }
    }
}

/*
All Video Related Functions
*/

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
    $new_position = incrementVideoPosition($category);
    $url = str_replace("watch?v=", "embed/", $url);
    if (empty($category)) {
        // Sql query to be executed
        $sql = "INSERT INTO `playlist` (`title`, `content` , `slug`, `player_url` , `meta_description` , `meta_keywords` , `thumbnail` , `hidden` , `position`) VALUES ('$title', '$content' , '$slug', '$url' , '$meta_description' , '$meta_keywords' , '$thumbnail_url', '$hidden', '$new_position')";
    } else {
        $sql = "SELECT * FROM `category` where category_id = $category";
        $result = mysqli_query($conn, $sql);
        $row_category = mysqli_fetch_assoc($result);
        $cat_name = $row_category['category_name'];
        // Sql query to be executed
        $sql = "INSERT INTO `playlist` (`title`, `content` , `category_id` , `slug` , `category_name` , `player_url` , `meta_description` , `meta_keywords` , `thumbnail` , `hidden` , `position`) VALUES ('$title', '$content' , '$category' , '$slug' , '$cat_name' , '$url' , '$meta_description' , '$meta_keywords' , '$thumbnail_url', '$hidden', '$new_position')";
    }
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "done";
    } else {
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
        $current_category = getCurrentCategoryId($id);

        //If Category Changed we will handle position
        if ($current_category != $category) {
            $new_position = incrementVideoPosition($category);
            if (empty($category)) {  //If Unlisted
                // Sql query to be executed
                $sql = "UPDATE `playlist` SET `title` = '$title' , `slug` = '$slug' , `content` = '$content' , `category_id` = '' , `category_name` = 'Unlisted' , `player_url` = '$url' , `meta_description` = '$meta_description' , `meta_keywords` = '$meta_keywords' , `thumbnail` = '$thumbnail', `hidden` = '$hidden', `position` = '$new_position' WHERE `playlist`.`id` = $id";
            } else {
                $sql = "SELECT * FROM `category` where `category_id` = $category";
                $result = mysqli_query($conn, $sql);
                $row_category = mysqli_fetch_assoc($result);
                $category_name = $row_category['category_name'];
                // Sql query to be executed
                $sql = "UPDATE `playlist` SET `title` = '$title' , `slug` = '$slug' , `content` = '$content' , `category_id` = '$category' , `category_name` = '$category_name' , `player_url` = '$url' , `meta_description` = '$meta_description' , `meta_keywords` = '$meta_keywords' , `thumbnail` = '$thumbnail', `hidden` = '$hidden', `position` = '$new_position' WHERE `playlist`.`id` = $id";
            }
        } else //If Category Not Changed we will just update all content except position
        {

            if (empty($category)) {
                // Sql query to be executed
                $sql = "UPDATE `playlist` SET `title` = '$title' , `slug` = '$slug' , `content` = '$content' , `category_id` = '' , `category_name` = '' , `player_url` = '$url' , `meta_description` = '$meta_description' , `meta_keywords` = '$meta_keywords' , `thumbnail` = '$thumbnail', `hidden` = '$hidden' WHERE `playlist`.`id` = $id";
            } else {
                $sql = "SELECT * FROM `category` where `category_id` = $category";
                $result = mysqli_query($conn, $sql);
                $row_category = mysqli_fetch_assoc($result);
                $category_name = $row_category['category_name'];
                // Sql query to be executed
                $sql = "UPDATE `playlist` SET `title` = '$title' , `slug` = '$slug' , `content` = '$content' , `category_id` = '$category' , `category_name` = '$category_name' , `player_url` = '$url' , `meta_description` = '$meta_description' , `meta_keywords` = '$meta_keywords' , `thumbnail` = '$thumbnail', `hidden` = '$hidden' WHERE `playlist`.`id` = $id";
            }
        }
        $result = mysqli_query($conn, $sql);
        //Sort Videos
        sortVideoOnChange($current_category);
        if ($result) {
            echo "Done";
            header('Location: index.php');
            exit();
        } else {
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
        } else {
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
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Multiple Hide Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['multipleHide'])) {
        $data =  json_decode($_POST['multipleHide']);
        $id_string = ""; //Will make a string containing all id's of rows to hide
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        $sql = "UPDATE `playlist` SET `hidden` = 1 WHERE `playlist`.`id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Hidden All Successfully";
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Multiple Un-Hide Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['multipleUnHide'])) {
        $data =  json_decode($_POST['multipleUnHide']);
        $id_string = ""; //Will make a string containing all id's of rows to hide
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        $sql = "UPDATE `playlist` SET `hidden` = 0 WHERE `playlist`.`id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Un-Hidden All Successfully";
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Delete Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deleteVideo'])) {
        $id = $_POST['deleteVideo'];
        // Get category id
        $sql = "SELECT * FROM `playlist` WHERE `playlist`.`id`=  $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $category_id = $row['category_id'];
        // Delete Video
        $sql = "DELETE FROM `playlist` WHERE `playlist`.`id` = $id";
        $result = mysqli_query($conn, $sql);
        //Sort Videos
        sortVideoOnChange($category_id);
        if ($result) {
            echo "Deleted Successfully";
        } else {
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
}

// Multiple Delete Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['multipleDelete'])) {
        $data =  json_decode($_POST['multipleDelete']);

        // Get category id
        $sql = "SELECT * FROM `playlist` WHERE `playlist`.`id`= " . $data[0][0] . "";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $category_id = $row['category_id'];

        $id_string = ""; //Will make a string containing all id's of rows to delete
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        //Delete Videos
        $sql = "DELETE FROM `playlist` WHERE `playlist`.`id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        //Sort Videos
        sortVideoOnChange($category_id);
        if ($result) {
            echo "Deleted All Successfully";
        } else {
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
}

// Multiple Change Video Playlist
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['changeCategory'])) {
        $data =  json_decode($_POST['changeCategory']);
        $category = $_POST['categoryId'];
        $category_name = $_POST['categoryName'];
        foreach ($data as $element) {
            $id = $element[0];
            $current_category = getCurrentCategoryId($id);
            //If Category Changed we will handle position
            //Sometimes we update category by selecting current category, so checking this is must, otherwise we will increment position unneccesarily
            if ($current_category != $category) {
                $new_position = incrementVideoPosition($category);
                if (empty($category)) {
                    // Sql query to be executed
                    $sql = "UPDATE `playlist` SET `category_id` = '' , `category_name` = '$category_name' , `position` = '$new_position' WHERE `playlist`.`id` = $id";
                    $result = mysqli_query($conn, $sql);
                } else {
                    $sql = "SELECT * FROM `category` where `category_id` = $category";
                    $result = mysqli_query($conn, $sql);
                    $row_category = mysqli_fetch_assoc($result);
                    $category_name = $row_category['category_name'];
                    // Sql query to be executed
                    $sql = "UPDATE `playlist` SET `category_id` = '$category' , `category_name` = '$category_name' , `position` = '$new_position' WHERE `playlist`.`id` = $id";
                    $result = mysqli_query($conn, $sql);
                }
            } else //If Category Not Changed we will do nothing
            {
                $result = true;
                continue;
            }
        }
        //Sort Videos
        sortVideoOnChange($current_category);
        if ($result) {
            echo "Changed Category Successfully";
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}



/*
All Playlist Functions
*/

// Create Playlist
if (isset($_POST['playlist'])) {
    $playlist_name = $_POST['playlist'];
    $playlist_desc = $_POST['description'];
    // $playlist_url = $_POST['url'];
    $image_url = $_POST['img'];
    $hidden = $_POST['hidden'];
    $new_position = incrementCategoryPosition();
    $sql_pl = "INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `image_url` , `hidden` , `position`) VALUES (NULL, '$playlist_name', '$playlist_desc' , '$image_url' ,'$hidden', '$new_position')";
    $result_pl = mysqli_query($conn, $sql_pl);
    if ($result_pl) {
        echo "Playlist Created Successfully";
    } else {
        echo "We could not Update the record successfully" . mysqli_error($conn);
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
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Un-Hide Playlist
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['unhidePlaylist'])) {
        $id = $_POST['unhidePlaylist'];
        $sql = "UPDATE `category` SET `hidden` = 0 WHERE `category`.`category_id` = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Un-Hidden Successfully";
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Multiple Hide Playlists
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['multipleHidePlaylists'])) {
        $data =  json_decode($_POST['multipleHidePlaylists']);
        $id_string = ""; //Will make a string containing all id's of rows to hide
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        $sql = "UPDATE `category` SET `hidden` = 1 WHERE `category`.`category_id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Hidden All Successfully";
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Multiple Un-Hide Playlists
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['multipleUnHidePlaylists'])) {
        $data =  json_decode($_POST['multipleUnHidePlaylists']);
        $id_string = ""; //Will make a string containing all id's of rows to hide
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        $sql = "UPDATE `category` SET `hidden` = 0 WHERE `category`.`category_id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Un-Hidden All Successfully";
        } else {
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Delete Playlist
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deletePlaylist'])) {
        $id = $_POST['deletePlaylist'];
        $sql = "DELETE FROM `category` WHERE `category`.`category_id` = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Deleted Successfully";
        } else {
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
    //Sort Categories
    sortCategoryOnDeletion();
}

// Multiple Delete Playlists
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['multipleDeletePlaylists'])) {
        $data =  json_decode($_POST['multipleDeletePlaylists']);
        $id_string = ""; //Will make a string containing all id's of rows to delete
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        $sql = "DELETE FROM `category` WHERE `category`.`category_id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Deleted All Successfully";
        } else {
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
    //Sort Categories
    sortCategoryOnDeletion();
}

/*
Miscellaneous Functions
*/

// Get Playlist(Videos)
if (isset($_POST['getPlaylistNew'])) {
    // Retrieve the playlists from the database ordered by position
    $category_id = $_POST['getPlaylistNew'];
    $sql = "SELECT * FROM `playlist` WHERE `category_id` = '$category_id' ORDER BY `position` ASC";
    $result = mysqli_query($conn, $sql);

    // Generate the HTML table using the retrieved data
    $html = '';
    $num_rows = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {
        if($row['thumbnail'] == ""){
            $row['thumbnail'] = $home_url."img/thumbnail.jpg";
        }
        $html .= '  
        <li id="'.$row['id'].'" class="btn btn-primary p-1 d-flex justify-content-center" style="margin: 10px 0;">
            <div class="media align-items-center">
                <img src="'.$row['thumbnail'].'" class="mr-3 img-fluid" style="max-width: 150px;" alt="Playlist item image">
                <div class="media-body">
                   <h5 class="mt-0 mb-1">'.$row['title'].'</h5>
                </div>
            </div>
        </li>';
    }
    // Output the generated HTML list
    echo $html;
}

//Sort Playlist
if (isset($_POST['sort_playlist'])) {
    $category_id = $_POST['sort_playlist'];
    $sort_data = $_POST['sort_data'];

    foreach($sort_data as $key => $value){
        $sql = "UPDATE `playlist` SET `position` = ($key+1) WHERE `category_id` = $category_id AND `id` = $value";
        $result = mysqli_query($conn, $sql);
    }
    echo "Sort Done";
}

//Sort Category
if (isset($_POST['sort_category_data'])) {
    $sort_data = $_POST['sort_category_data'];

    foreach($sort_data as $key => $value){
        $sql = "UPDATE `category` SET `position` = ($key+1) WHERE `category_id` = $value";
        $result = mysqli_query($conn, $sql);
    }
    echo "Sort Done";
}