<?php
include "../includes/variables.php";
include "../dbconnect.php";

// Get Category Id from Category Table and process position column playlist
$sql = "SELECT * FROM `category`";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $category_id = $row['category_id'];
        $sql_pl = "SELECT * FROM `playlist` WHERE `category_id`= $category_id ORDER BY `id` ASC";
        $result_pl = mysqli_query($conn, $sql_pl);
        $num_pl = mysqli_num_rows($result_pl);
        $index = 1;
        if ($num_pl > 0) {
            while ($pl_row = mysqli_fetch_assoc($result_pl)) {
                $playlist_id = $pl_row['id'];
                $sql_new = "UPDATE `playlist` SET `position` = '$index' WHERE `id` = $playlist_id";
                $result_new = mysqli_query($conn, $sql_new);
                $index++;
            }
        }
    }
}

if ($result_new) {
    echo "Done";
} else {
    echo "We could not update the record successfully" . mysqli_error($conn);
}
?>
