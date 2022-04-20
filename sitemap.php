<?php 
header("Content-type: text/xml");
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

    $sql = "SELECT * FROM `playlist` ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);      
    while($row =  mysqli_fetch_assoc($result))
    { 
    $slug = $row['slug'];
    ?>
    <url>
        <loc><?php echo $home_url; ?><?php echo "video/".$slug; ?></loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>

 <?php } ?>

 <?php

    $sql = "SELECT * FROM `blogpost` ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);      
    while($row =  mysqli_fetch_assoc($result))
    { 
    $slug = $row['slug'];
    ?>
    <url>
        <loc><?php echo $home_url; ?><?php echo "blog/".$slug; ?></loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>

 <?php } ?>

</urlset>