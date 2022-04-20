<!DOCTYPE html>
<html lang="en">
<?php include "activities/variables.php" ?>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>function get_text(){
  var text = document.getElementById("commentText").value;
  document.getElementById("comment-box").style.pointerEvents = "none"
document.getElementById("comment-box").style.backgroundColor = "lightgray"
  add_comment(text);
}
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/utils.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/videos.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/mobile.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/blogpost.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/videos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .pace-inactive {
            display: none
        }

        .pace .pace-progress {
            background: #ff000d;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: 3px
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    
</head>

<body>
   <?php include "includes/header_official.php"?>

    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <!-- checking slug -->
    <?php
    include "dbconnect.php";
    require "functions.php";




    if (isset($_GET['slug'])) {
        $slug = $_GET['slug'];

        echo '<input type="hidden" value="' . $slug . '" id="slug" >';


        $sql = "SELECT * FROM `blogpost` WHERE `slug`='$slug'";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);


        if ($num > 0) {
            $row = mysqli_fetch_assoc($result);

            $id = $row['id'];
            echo'<input type="hidden" id="post_id" value="'.$id.'">';
            $content = $row['content'];
            $title = $row['title'];
            $meta_description = $row['meta_description'];
            $meta_keywords = $row['meta_keywords'];



            echo '
            <title>' . $title . '</title>
            <meta name="description" content="' . $meta_description . '">
            <meta name="keywords" content="' . $meta_keywords . '">
                <div id="content"><div class="m-auto blog-post-content max-width-2 m-auto my-2">
                    <h1 class="font1">' . $title . '</h1>
                    <hr><br>
                    <div class="blogpost-meta">
                    
                    
                    </div>
            <div class="font1 embed-responsive-item">
            ' . $content . '</div></div>';
        echo'<div id="comment-box">';

            // include "add_comment.php";
            if ($loggedin==false) {

                echo '<h2>Login to  post A comment</h2> <br>
                <a style="text-decoration: none;" class="button" href="/blog/activities/login.php">Login</a>';
        
        }
        
        if ($loggedin) {
            echo '<form>
        <div class="mb-3">
          <textarea id="commentText"  placeholder="Add a Public Comment." class="form-control" name="comment"></textarea>
        </div>
        
        <button type="button" id="add_comment" onclick="get_text()"  class="button">Submit</button>
        </form>';
        }
        
        echo '</div>';
            echo '<div id="newComment"></div>
            <div id="newShowComment"></div>
            <div id="showComment"></div>';


            
        } else {
            echo '<div class="home-article more-post">
                <div style="width: 250px" class="home-article-img">
                    <img style="width: 250px" src="'.$home_url.'img/404.jpg" alt="article">
                </div>
                <div class="home-article-content font1 center">
                    <h3 style="color: black">The page you request was not found lease check the url.</h3>
                    
                    
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
        if (strlen($image_url) > 1) {
            echo '
            <div class="row">
    
           
            <div class="home-article more-post">
                <div class="home-article-img"><a href="'.$home_url.'blogpost/' . $slug . '">
                    <img style="width: 250px" src="' . $image_url . '" alt="article"></a>
                </div>
    
                <div class="home-article-content font1 center">
                    <a href="'.$home_url.'blogpost/' . $slug . '"><h5>' . $title . '</h5></a>
                    
                   
                </div>
            </div>';
        } else {
            echo '
        <div class="row">

       
        <div class="home-article more-post">
            <div class="home-article-img">
            <a href="'.$home_url.'blogpost/' . $slug . '">
                <img src="'.$home_url.'img/11.svg" style="width: 250px" alt="article"></a>
            </div>

            <div class="home-article-content font1 center">
            <a href="'.$home_url.'blogpost/' . $slug . '"><h5>' . $title . '</h5></a>
                
               
            </div>
        </div>';
        }
    }
    ?>
    </div>



    </div>
    <script src="<?php echo $home_url; ?>js/script.js"></script>
    <script src="<?php echo $home_url; ?>js/show_hide.js"></script>
    <script src="<?php echo $home_url; ?>js/comment.js"></script>

</body>

</html>