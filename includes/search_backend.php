<?php
include "./../dbconnect.php";

// This will send all data, search will be further performed via js

$sql = "SELECT `title`, `slug` FROM `playlist` WHERE `hidden` = 0
UNION
SELECT `category_name` AS `title`, `category_slug` AS `slug` FROM `category` WHERE `hidden` = 0";
$result = mysqli_query($conn, $sql);
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = array('title' => $row['title'], 'slug' => $row['slug']);
}
echo json_encode($rows);
?>
