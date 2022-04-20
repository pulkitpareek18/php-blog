<?php
include "dbconnect.php";

if(isset($_GET['comment'])){

    session_start();

    $comment =  $_GET['comment'];
    $comment = mysqli_real_escape_string($conn,$comment);
    
    
    $post_id = $_GET['post_id'];



    $username = $_SESSION['username'];

    $sql_insert_comment = "INSERT INTO `video_comments` (`comment_content`, `comment_post_id` , `username` ) VALUES ('$comment', '$post_id' ,'$username')";
    $result_insert_comment = mysqli_query($conn,$sql_insert_comment);


    
    
    if($result_insert_comment){
        $sql_comments = "SELECT * FROM `video_comments` WHERE `username`='$username'  order by comment_id desc limit 1 ";
        $result_comments = mysqli_query($conn, $sql_comments);
        echo'{"arr":[';
            while ($row_comments=mysqli_fetch_assoc($result_comments)) {
                $comment_id =  $row_comments['comment_id'];
    
                echo'{"username":"'.$row_comments['username'].'", "comment_content":"'.$row_comments['comment_content'].'", "dates":"'.$row_comments['date'].'" , "comment_id":"'.$row_comments['comment_id'].'"}';
              }
              
              echo']}';
            
    // echo "comment added";
          exit();

        
    
    }
     else{
    echo "dddddddddddddd";
        echo mysqli_error($conn);
    }
   

    
}




// if ($loggedin==false) {

//         echo '<h2>Login to  post A comment</h2> <br>
//         <a style="text-decoration: none;" class="button" href="/blog/activities/login.php">Login</a>';

// }

// if ($loggedin) {
//     echo '<form  action="/blog/blogpost.php?slug='.$slug.'" method="post" >
// <input type="hidden" value="'.$id.'" id="post_id" name="post_id">
// <div class="mb-3">
//   <textarea id="commentText"  placeholder="Add a Public Comment." class="form-control" name="comment"></textarea>
// </div>

// <button type="button" id="send" class="button">Submit</button>
// </form>';
// }

?>