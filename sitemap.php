<?php 
header("Content-type: application/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
include 'dbconnect.php';
include 'activities/variables.php';
?>

<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">
    <url>
        <loc>https://iblog.rf.gd/</loc>
        <priority>1.00</priority>
    </url>
    <?php
    $sql = "SELECT * FROM playlist ORDER BY id ASC";
    $result = mysqli_query($conn,$sql);      
    while($row = mysqli_fetch_assoc($result))
    { 
    $slug = stripslashes($row['slug']);
    ?>
    <url>
        <loc>https://<?php echo "iblog.rf.gd"; ?>/<?php echo "$slug" ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
 <?php } ?>
</urlset>