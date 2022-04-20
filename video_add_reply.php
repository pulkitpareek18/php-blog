<?php


if (isset($_GET['reply_comment_text'])) {
    session_start();
    include "dbconnect.php";

    $reply_comment =  $_GET['reply_comment_text'];
    
    $reply_comment = mysqli_real_escape_string($conn, $reply_comment);
    
    $reply_comment_id = $_GET['reply_comment_id'];
    $username = $_SESSION['username'];
    $sql_insert_reply_comment = "INSERT INTO `video_reply_comments` (`reply_comment_content`, `replied_comment_id` , `username` ) VALUES ('$reply_comment', '$reply_comment_id' ,'$username')";
    $result_insert_reply_comment = mysqli_query($conn, $sql_insert_reply_comment);
    
    if ($result_insert_reply_comment) {


        $sql_comments = "SELECT * FROM `video_reply_comments` WHERE `username`='$username'  order by id desc limit 1 ";
        $result_comments = mysqli_query($conn, $sql_comments);


        echo'{"arr":[';

            while ($row_comments=mysqli_fetch_assoc($result_comments)) {

    
                echo'{"replier_username":"'.$row_comments['username'].'", "reply_comment_content":"'.$row_comments['reply_comment_content'].'", "dates":"'.$row_comments['date'].'"}';
              }
              
              echo']}';
            
    // echo "comment added";
          exit();
        // echo "reply added";
    } else {
        echo mysqli_error($conn);
        echo"ddd";
    }
}


?>

