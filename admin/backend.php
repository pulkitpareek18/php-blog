<?php
include "../activities/variables.php";
include "../dbconnect.php";

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
        }else{
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
        }else{
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}

// Delete Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deleteVideo'])) {
        $id = $_POST['deleteVideo'];
        $sql = "DELETE FROM `playlist` WHERE `playlist`.`id` = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Deleted Successfully";
        }else{
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
} 

// Multiple Delete Video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['multipleDelete'])) {
        $data =  json_decode($_POST['multipleDelete']);
        $id_string = ""; //Will make a string containing all id's of rows to delete
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        $sql = "DELETE FROM `playlist` WHERE `playlist`.`id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Deleted All Successfully";
        }else{
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
}

// Change Category
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['changeCategory'])) {
        $data =  json_decode($_POST['changeCategory']);
        $categoryId = $_POST['categoryId'];
        $categoryName = $_POST['categoryName'];
        $id_string = ""; //Will make a string containing all id's of rows to hide
        foreach ($data as $element) {
            $id_string .= strval($element[0]) . ",";
        }
        $id_string = rtrim($id_string, ',');
        $sql = "UPDATE `playlist` SET `category_id` = $categoryId, `category_name` = '$categoryName' WHERE `playlist`.`id` IN ($id_string)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Changed Category Successfully";
        }else{
            echo "We could not Update the record successfully" . mysqli_error($conn);
        }
    }
}



/*
All Playlist Related Functions
*/

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
        }else{
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
        }else{
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
        }else{
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
        }else{
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
        }else{
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
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
        }else{
            echo "We could not Delete the record successfully" . mysqli_error($conn);
        }
    }
}

/*
Miscellaneous Function
*/
if (isset($_POST['getPlaylist'])) {
    // Retrieve the playlists from the database ordered by position
    $sql = "SELECT * FROM `playlist` ORDER BY `position` ASC";
    $result = mysqli_query($conn, $sql);

    // Generate the HTML table using the retrieved data
    $html = '<table class="table">
              <thead>
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Playlist Name</th>
                  <th scope="col">Up</th>
                  <th scope="col">Down</th>
                </tr>
              </thead>
              <tbody>';

    $num_rows = mysqli_num_rows($result);
    $sno = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= '<tr>
                    <th scope="row">' . $sno . '</th>
                    <td>' . $row['title'] . '</td>';

        // Check if the playlist is not the only row in the table
        if ($num_rows > 1) {
            // Check if the playlist is not at the top (position 1)
            if ($row['position'] != 1) {
                $html .= '<td><a onclick="movePlaylist(\'id=' . $row['id'] . '&direction=up\')"><i class="fa fa-2x fa-arrow-up"></i></a></td>';
            } else {
                // Send the first row to the last position if its up arrow is clicked
                $html .= '<td><a onclick="movePlaylist(\'id=' . $row['id'] . '&direction=last\')"><i class="fa fa-2x fa-arrow-up"></i></a></td>';
            }

            // Check if the playlist is not at the bottom (last position)
            if ($row['position'] != $num_rows) {
                $html .= '<td><a onclick="movePlaylist(\'id=' . $row['id'] . '&direction=down\')"><i class="fa fa-2x fa-arrow-down"></i></a></td>';
            } else {
                // Send the last row to the first position if its down arrow is clicked
                $html .= '<td><a onclick="movePlaylist(\'id=' . $row['id'] . '&direction=first\')"><i class="fa fa-2x fa-arrow-down"></i></a></td>';
            }
        } else {
            // Only one row, don't show any arrows
            $html .= '<td></td><td></td>';
        }

        $html .= '</tr>';
        $sno++;
    }

    $html .= '</tbody></table>';

    // Output the generated HTML table
    echo $html;
}

// Arrange Playlist
if (isset($_GET['id']) && isset($_GET['direction'])) {
    // Get the current position of the selected playlist
    $sql = "SELECT `position` FROM `playlist` WHERE `id` = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $current_position = $row['position'];

    // Get the total number of playlists
    $sql = "SELECT COUNT(*) AS `count` FROM `playlist`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_playlists = $row['count'];

    // Calculate the new position based on the direction
    switch ($_GET['direction']) {
        case 'up':
            $new_position = $current_position - 1;
            break;
        case 'down':
            $new_position = $current_position + 1;
            break;
        case 'first':
            $new_position = 1;
            break;
        case 'last':
            $new_position = $total_playlists;
            break;
    }

    // Make sure the new position is within the bounds of the playlist
    if ($new_position < 1) {
        $new_position = $total_playlists;
    } elseif ($new_position > $total_playlists) {
        $new_position = 1;
    }

    // Update the positions of the affected playlists
    if ($current_position != $new_position) {
        if ($current_position < $new_position) {
            $sql = "UPDATE `playlist` SET `position` = (`position` - 1) WHERE `position` > " . $current_position . " AND `position` <= " . $new_position;
        } else {
            $sql = "UPDATE `playlist` SET `position` = (`position` + 1) WHERE `position` >= " . $new_position . " AND `position` < " . $current_position;
        }
        mysqli_query($conn, $sql);

        $sql = "UPDATE `playlist` SET `position` = " . $new_position . " WHERE `id` = " . $_GET['id'];
        mysqli_query($conn, $sql);
    }

    if ($result) {
        echo "Success";
    } else {
        echo "We could not update the record successfully" . mysqli_error($conn);
    }
}

