<?php


if (isset($_POST['reply_comment'])) {
    session_start();
    include "dbconnect.php";

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


?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/comment.js"></script>
<script src="js/script.js"></script>