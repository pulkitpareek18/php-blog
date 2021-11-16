<?php
include "dbconnect.php";
if(isset($_POST['comment'])){

    session_start();

    $comment =  $_POST['comment'];
    
    $comment = mysqli_real_escape_string($conn,$comment);
    
    $post_id = $_POST['post_id'];



    $username = $_SESSION['username'];

    $sql_insert_comment = "INSERT INTO `comments` (`comment_content`, `comment_post_id` , `username` ) VALUES ('$comment', '$post_id' ,'$username')";
    $result_insert_comment = mysqli_query($conn,$sql_insert_comment);


    
    
    if($result_insert_comment){
    
        echo "comment added";
    
    }else{
    
        echo mysqli_error($conn);
    }

    
}



require_once "functions.php";

if ($loggedin==false) {

        echo '<h2>Login to  post A comment</h2> <br>
        <a style="text-decoration: none;" class="button" href="/blog/activities/login.php">Login</a>';

}

if ($loggedin) {
    echo '<form  action="/blog/blogpost.php?slug='.$slug.'" method="post" >
<input type="hidden" value="'.$id.'" id="post_id" name="post_id">
<div class="mb-3">
  <textarea id="commentText"  placeholder="Add a Public Comment." class="form-control" name="comment"></textarea>
</div>

<button type="button" id="send" class="button">Submit</button>
</form>';
}

?>