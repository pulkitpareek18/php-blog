<?php
include "loginCheck.php";
include "../dbconnect.php";

$sql = "SELECT * FROM `category` ORDER BY `category_id` ASC";
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

if ($result_new) {
    echo "Done";
} else {
    echo "We could not update the record successfully" . mysqli_error($conn);
}

?>
