<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/videos.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/blogpost.css">
    <link rel="stylesheet" href="css/videos.css">
    <link rel="shortcut icon" href="/blog/img/logo.png" type="image/x-icon">

    <script src="js/script.js"></script>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>

.pace{-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}.pace-inactive{display:none}.pace .pace-progress{background:#ff000d;position:fixed;z-index:2000;top:0;right:100%;width:100%;height:3px}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
</head>
<?php include"includes/header.php" ?>

<body>

    <?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
// if (!$conn) {
//     die("Sorry we failed to connect: " . mysqli_connect_error());
// } else {
//     echo "Connection was successful<br>";
// }


// checking slug

      
if(isset($_GET['slug'])){
  
  $slug = $_GET['slug'];


// selecting row where slug matches

        $sql = "SELECT * FROM `playlist` WHERE `slug`='$slug'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        // if row found then fetching category id of video

            $no = 1;
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                
                    $category_id = $row['category_id'];
                    $id = $row['id'];
                }
            }else{
                die('<div style="margin: 100px;height: 250px" class="alert text-center alert-danger" role="alert">
                <h4 class="alert-heading">404 Page Not Found!</h4>
                <p</p>
                <hr>
                <p class="mb-0">THE PAGE YOU REQUESTED WAS NOT FOUND ON THE SERVER PLEASE CHECK THE URL</p>
                <div  class=" text-center mt-5">
                <a href="/blog/blog.php"style="color: white;"  class="button btn-danger">Browse Blog</a>
                <a href="/blog/video.php"style="color: white;"class="button btn-success">Browse Video Tutorials</a>
                <a href="/blog/contact.php"style="color: white;"class="button btn-primary">Contact Us</a>
        </div></div>');
            }

            // fetching all videos related to that category id

            $sql_playlist = "SELECT * FROM `playlist` WHERE `category_id`='$category_id' order by id ASC";
            $result_playlist = mysqli_query($conn, $sql_playlist);


            echo '

    <div class="playlist">
   
        <div class="playlist-content">
        <div class=" cbtn container form-inline" style="background-color: rgba(245, 245, 245, 0.849);">
            <h5>Course Content</h5>
            <button class="btn btn-danger ml-3 m-2 mr-0" onclick="show_hide()"  id="show_hide">Hide Player</button>
        </div>';

            
    
    // displaying all those videos in playlist

while ($row_playlist = mysqli_fetch_assoc($result_playlist)) {
   
    $title = $row_playlist['title'];
    $full =  $no . ' .' . $title;
   

    echo
    


        '<a class="margin-playlist" style="text-decoration: none" href="http://localhost/blog/video.php?slug=';
    echo $row_playlist['slug'];
    echo '">';
    echo ' <div class="embed-responsive-item hvtext vid' . $row_playlist['slug'] . '" style="
                                     bottom: 0;     
                                     left: 0;
                                     right: 0;
                                     color: rgb(31, 28, 28);
                                     width: 100%;"><li  class="font1 margin-text"  style="list-style: none;margin-bottom=0%">' . $full . '</li></div>';

    echo '</a><hr class="m-0 p-0">';
    echo '<style> .vid' . $slug . '{   background-color: rgb(179, 179, 179); } </style>';
    $no = $no + 1;

// fetching content of that particular slug entered in url

    $sql_content = "SELECT * FROM `playlist` WHERE id = $id";
    $result_content = mysqli_query($conn,$sql_content);
    $row_content =     mysqli_fetch_assoc($result_content);
    $content = $row_content['content'];
    $title_real = $row_content['title'];
    $player_url = $row_content['player_url'];
    $meta_description = $row_content['meta_description'];
    $meta_keywords = $row_content['meta_keywords'];
    if(strlen($player_url)>1){
        

        echo'<style>#course_player{display: block;}</style>';
        
    }else{
        echo '<style>#course_player{display: none;}.cbtn{display: none;}</style>';
    }


   
}








echo '
        </div>

    </div>


    </div>
    </div>
    <body >

<!-- displaying content and previous and next buttons -->

<div onload="show_hide()" class="  embed-responsive-item card" style="width: 74.2%;margin-top: 0;paddding-top: 0;background-color: rgba(245, 245, 245, 0.849);border: 0">
<body>
<div onload="show_hide()" id="course_player"  class="embed-responsive embed-responsive-16by9"  >
  <iframe class="embed-responsive-item" src="'.$player_url.'" allowfullscreen></iframe>
</div>
</body>
    <div  class="m-2 ml-5 card-body">';
         
       

       echo $content; 
       //setting page html title seo description and seo keywords
        echo '<title>'.$title_real.'</title>
        <meta name="description" content="'.$meta_description.'">
        <meta name="keywords" content="'.$meta_keywords.'">';



    $sql_next = "SELECT * FROM `playlist` WHERE `category_id`='$category_id' && id > $id";
    $result_next = mysqli_query($conn, $sql_next);
    $num_next = mysqli_num_rows($result_next);
    
    
    $sql_previous = "SELECT * FROM `playlist` WHERE `category_id`='$category_id' && id < $id order by id DESC";
    $result_previous = mysqli_query($conn, $sql_previous);
    $num_previous = mysqli_num_rows($result_previous);

    if($num_previous>0){
        $row_previous = mysqli_fetch_assoc($result_previous);

         $previous = $row_previous['slug'];
         echo'<a class="btn btn-danger button_previous" style="float:left"
         href="http://localhost/blog/video.php?slug='.$previous.'">
         <- PREVIOUS</a>';

    }else{
        echo '<style>.button_previous{display:none;}</style>';
    }



    if($num_next>0){
    $row_next = mysqli_fetch_assoc($result_next);
    $next = $row_next['slug'];
    echo' <a class="btn btn-danger button_next" style="float:right"
            href="http://localhost/blog/video.php?slug='.$next.'">NEXT -></a>
        
    </div>';
    }
    else{
        echo '<style>.button_next{display:none;}</style>';
    }
    
   echo'</div>';    

}else{
    include "dbconnect.php";
    $sql = "SELECT * FROM `category`";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
     
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
        $image_url = $row['image_url'];
        $category_url = $row['category_url'];

        echo'
        <title>iBlog - Videos</title>
        <div class="card text-center ml-4 m-3" style="width: 30%;display:inline-block;border: none;">
        <div style="width: 30% class="card-body" >
        <img style="border-radius: 50%;width: 200px;" class="card-img-top" src="'.$image_url.'" alt="Card image cap">
        
        <div class="card mt-2  p-3" style="border-radius: 2%;border:none;"> 
        <h5 class="card-title">'.$category_name.'</h5>
          <p class="card-text">'.$category_description.'</p>
          <a href="'.$category_url.'" class="btn btn-outline-danger text-center mx-auto" style="">Start Watching</a>
        </div></div>
      </div>';



    }


}

?>
  
  










</div>
<div class="footer-video ">
        
<br>
        <p>Copyright &copy; iBlog.com </p>
    
    
    </div>

   
</body>

</html>