<?php 
//sitemap.php to sitemap.xml using .htaccess file 
include "dbconnect.php";

               

//define your base URLs 
//Main URL 
$video_url = "https://iblogsikar.ga/blog/video/";

$blog_url = "https://iblogsikar.ga/blog/blogpost.php?slug=";




header("Content-Type: application/xml; charset=utf-8");

echo '<!--?xml version="1.0" encoding="UTF-8"?-->'.PHP_EOL; 

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemalocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
echo '<url>' . PHP_EOL;
 echo '<loc>https://iblogsikar.ga</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
echo '<url>' . PHP_EOL;

 echo '<loc>https://iblogsikar.ga/blog/blog</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
echo '<url>' . PHP_EOL;

 echo '<loc>https://iblogsikar.ga/blog/blogpost</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
echo '<url>' . PHP_EOL;

 echo '<loc>https://iblogsikar.ga/blog/contact</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
echo '<url>' . PHP_EOL;

 echo '<loc>https://iblogsikar.ga/blog/video</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;

$sql_video = "SELECT * FROM `playlist` order by id desc";
$result_video = mysqli_query($conn,$sql_video);
while($row = mysqli_fetch_assoc($result_video)){

 echo '<url>' . PHP_EOL;
 echo '<loc>'.$video_url. $row["slug"] .'</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;

}


$sql_blog = "SELECT * FROM `blogpost` order by id desc";
$result_blog = mysqli_query($conn,$sql_blog);
while($row = mysqli_fetch_assoc($result_blog)){

 echo '<url>' . PHP_EOL;
 echo '<loc>'.$blog_url. $row["slug"] .'</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;

}

echo '</urlset>' . PHP_EOL;

?>