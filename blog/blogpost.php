<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blogpost.css">
    <link rel="stylesheet" href="css/mobile.css">
    
    <style>


.pace{-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}.pace-inactive{display:none}.pace .pace-progress{background:#ff000d;position:fixed;z-index:2000;top:0;right:100%;width:100%;height:3px}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
</head>
<body>
    <nav class="navigation max-width-1 m-auto">
        <div class="nav-left">
            <a href="/blog/">
                <span><img src="img/logo.png" width="94px" alt=""></span>
            </a>
            <ul>
            <ul>
                <li><a href="http://localhost/blog">Home</a></li>
                <li><a href="http://localhost/blog/blog.php">Blog</a></li>
                <li><a href="http://localhost/blog/video.php">Video</a></li>
                <li><a href="http://localhost/blog/contact.php">Contact</a></li>
            </ul>
            </ul>
        </div>
        
        <div style="text-align: center" class="nav-right ">
            <form action="/blog/search.php" method="get">
                <input  pattern="[^*()/><\][\\\x22,;.|]+" required class="form-input" type="text" name="search_query" placeholder="Video Search">
                <button class=" button">Search</button>
            </form>

        </div>
        <div  style="text-align: center" class="nav-right">
            <form action="/blog/bsearch.php" method="get">
                <input  pattern="[^*()/><\][\\\x22,;.|]+" required class="form-input" type="text" name="search_query" placeholder="Article Search">
                <button class="button">Search</button>
            </form>

        </div>
        <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    </nav>
    <div class="max-width-1 m-auto">
        <hr>
    </div>
   <!-- checking slug -->
<?php
include "dbconnect.php";
require "functions.php";

if (isset($_POST['comment'])) {
    $comment =  $_POST['comment'];

    $comment = mysqli_real_escape_string($conn, $comment);

    $post_id = $_POST['post_id'];
    $username = $_SESSION['username'];
    $sql_insert_comment = "INSERT INTO `comments` (`comment_content`, `comment_post_id` , `username` ) VALUES ('$comment', '$post_id' ,'$username')";
    $result_insert_comment = mysqli_query($conn, $sql_insert_comment);

    if ($result_insert_comment) {
        echo "comment added";
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_POST['reply_comment'])) {
    $reply_comment =  $_POST['reply_comment'];
    
    $reply_comment = mysqli_real_escape_string($conn, $reply_comment);
    
    $reply_comment_id = $_POST['reply_comment_id'];
    $username = $_SESSION['username'];
    $sql_insert_reply_comment = "INSERT INTO `reply_comments` (`reply_comment_content`, `replied_comment_id` , `username` ) VALUES ('$reply_comment', '$reply_comment_id' ,'$username')";
    $result_insert_reply_comment = mysqli_query($conn, $sql_insert_reply_comment);
    
    if ($result_insert_reply_comment) {
        echo "reply added";
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    echo'<input type="hidden" value="'.$slug.'" id="slug" >';

        
    $sql = "SELECT * FROM `blogpost` WHERE `slug`='$slug'";

    $result = mysqli_query($conn, $sql);
        
    $num = mysqli_num_rows($result);


    if ($num>0) {
        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        $content = $row['content'];
        $title = $row['title'];
        $meta_description = $row['meta_description'];
        $meta_keywords = $row['meta_keywords'];


            
        echo '
            <title>'.$title.'</title>
            <meta name="description" content="'.$meta_description.'">
            <meta name="keywords" content="'.$meta_keywords.'">
                <div class="m-auto blog-post-content max-width-2 m-auto my-2">
                    <h1 class="font1">'.$title.'</h1>
                    <hr><br>
                    <div class="blogpost-meta">
                    
                    
                    </div>
            <div class="font1 embed-responsive-item">
            '.$content.'</div>';

    
        include "add_comment.php";


        echo'<div id="showComment">';

        include "show_comment.php";

        echo'</div>';
    } else {
        echo'<div class="home-article more-post">
                <div style="width: 250px" class="home-article-img">
                    <img style="width: 250px" src="img/404.jpg" alt="article">
                </div>
                <div class="home-article-content font1 center">
                    <a href="/blogpost.html"><h3 style="color: black">The page you request was not found lease check the url.</h3></a>
                    
                    
                </div>
             </div>';
    }
}


?>


    </div>
    <?php
    include "dbconnect.php";
        $sql = "SELECT * FROM `blogpost`  order by id desc limit 3 ";

        $result = mysqli_query($conn, $sql);
        echo '
        <div class="max-width-1 m-auto"><hr></div>
        <div class="home-articles max-width-1 m-auto font2">
            <h2>Recent Posts</h2>';
       while ($row = mysqli_fetch_assoc($result)) {

        // $image_url = $row['image_url'];
           $title = $row['title'];
           $slug = $row['slug'];
           $image_url = $row['image_url'];
           if (strlen($image_url)>1) {
               echo'
            <div class="row">
    
           
            <div class="home-article more-post">
                <div class="home-article-img"><a href="/blog/blogpost.php?slug='.$slug.'">
                    <img style="width: 250px" src="'.$image_url.'" alt="article"></a>
                </div>
    
                <div class="home-article-content font1 center">
                    <a href="/blog/blogpost.php?slug='.$slug.'"><h3>'. $title.'</h3></a>
                    
                   
                </div>
            </div>';
           } else {
               echo'
        <div class="row">

       
        <div class="home-article more-post">
            <div class="home-article-img">
            <a href="/blog/blogpost.php?slug='.$slug.'">
                <img src="img/11.svg" style="width: 250px" alt="article"></a>
            </div>

            <div class="home-article-content font1 center">
                <a href="/blog/blogpost.php?slug='.$slug.'"><h3>'. $title.'</h3></a>
                
               
            </div>
        </div>';
           }
       }
    ?>
       </div>
       


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/comment.js"></script>
<script src="js/script.js"></script>
</body>
</html>