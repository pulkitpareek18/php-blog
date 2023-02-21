<?php 

include "../dbconnect.php";
    
// Retrieve the playlists of the specified category from the database ordered by position
$sql = "SELECT * FROM `playlist` WHERE `category_id` = $category_id ORDER BY `position` ASC";
$result = mysqli_query($conn, $sql);

// Generate the HTML list using the retrieved data
$html = '<ul>';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<li>' . $row['title'] . '</li>';
}
$html .= '</ul>';

// Return the generated HTML list
echo $html;

?>