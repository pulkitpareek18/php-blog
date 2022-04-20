<?php
include "dbconnect.php";





// displaying total comments

if (isset($_GET['post_id'])) {
    $id = $_GET['post_id'];
    // $slug = $_GET['slug'];
    $sql_comments = "SELECT * FROM `video_comments` WHERE `comment_post_id`='$id' order by comment_id desc";

    $result_comments = mysqli_query($conn, $sql_comments);

    $num_comments = mysqli_num_rows($result_comments);
    $num_comments_second_last = $num_comments-1;

    $sql_comments = "SELECT * FROM `video_comments` WHERE `comment_post_id`='$id'  order by comment_id desc limit $num_comments_second_last ";
    $result_comments = mysqli_query($conn, $sql_comments);
    $sql_comments_last = "SELECT * FROM `video_comments` WHERE `comment_post_id`='$id'order by comment_id desc limit $num_comments_second_last, 1  ";
    $result_comments_last = mysqli_query($conn, $sql_comments_last);

    if ($num_comments>0) {
      
        
echo'{"arr":[';
        while ($row_comments=mysqli_fetch_assoc($result_comments)) {
            $comment_id =  $row_comments['comment_id'];



            $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

            $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
      
            $num_replies = mysqli_num_rows($result_replies_comments);



            echo'{"username":"'.$row_comments['username'].'", "comment_content":"'.$row_comments['comment_content'].'", "dates":"'.$row_comments['date'].'", "comment_id":"'.$row_comments['comment_id'].'" ,"num_replies":"'.$num_replies.'"';
              




// checking replies

    if ($num_replies>0) {


                echo' ,"comment_replies":[';

              if ($num_replies>1) {
                      $num_replies_second_last = $num_replies-1;
                      $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc  limit $num_replies_second_last";

                      $result_replies_comments = mysqli_query($conn, $sql_replies_comments);

                      while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {

                    echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" },';
                }


                      $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id  order by id desc limit $num_replies_second_last, 1";

                              $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
                      while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {
                
                        echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" }';
                   }
              }


              if($num_replies == 1) {


                   while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {
   
                    echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" }';
                
                  }
                
                  }


               echo']},';

         }else{
         
            echo'},';
               
      }




   }

          while ($row_comments=mysqli_fetch_assoc($result_comments_last)) {
            $comment_id =  $row_comments['comment_id'];
          
          
          $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

          $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
    
          $num_replies = mysqli_num_rows($result_replies_comments);



            echo'{"username":"'.$row_comments['username'].'", "comment_content":"'.$row_comments['comment_content'].'", "dates":"'.$row_comments['date'].'", "comment_id":"'.$row_comments['comment_id'].'","num_replies":"'.$num_replies.'"';
          


         


// checking replies 22222222

if ($num_replies>0) {


            echo' ,"comment_replies":[';

          if ($num_replies>1) {
                  $num_replies_second_last = $num_replies-1;
                  $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc  limit $num_replies_second_last";

                  $result_replies_comments = mysqli_query($conn, $sql_replies_comments);

                  while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {

                echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'"},';
            }


                  $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id  order by id desc limit $num_replies_second_last, 1";

                  $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
                  while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {
            
                    echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'"}';
               }
          }


          if($num_replies == 1) {


               while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {

                echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'"}';
            
              }
            
              }


           echo']}';

     }else{
     
        echo'}';
           
  }
          
}    
         
echo ']}'; 
      
      

      }
      
      exit();
 }




// displaying last comment when comment added

if (isset($_GET['last_comment_display_post_id'])) {
  session_start();

  $id = $_GET['last_comment_display_post_id'];
  // $slug = $_GET['slug'];
  $username = $_SESSION["username"];
  $sql_comments = "SELECT * FROM `video_comments` WHERE `comment_post_id`='$id' & `username`='$username' order by comment_id desc limit 1";

  $result_comments = mysqli_query($conn, $sql_comments);

  $num_comments = mysqli_num_rows($result_comments);

  

  if ($num_comments>0) {
    
      
echo'{"arr":[';
      while ($row_comments=mysqli_fetch_assoc($result_comments)) {
          $comment_id =  $row_comments['comment_id'];



          $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

          $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
    
          $num_replies = mysqli_num_rows($result_replies_comments);



          echo'{"username":"'.$row_comments['username'].'", "comment_content":"'.$row_comments['comment_content'].'", "dates":"'.$row_comments['date'].'", "comment_id":"'.$row_comments['comment_id'].'" ,"num_replies":"'.$num_replies.'"';
            




// checking replies

  if ($num_replies>0) {


              echo' ,"comment_replies":[';

            if ($num_replies>1) {
                    $num_replies_second_last = $num_replies-1;
                    $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc  limit $num_replies_second_last";

                    $result_replies_comments = mysqli_query($conn, $sql_replies_comments);

                    while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {

                  echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" },';
              }


                    $sql_replies_comments = "SELECT * FROM `video_reply_comments` WHERE `replied_comment_id`=$comment_id  order by id desc limit $num_replies_second_last, 1";

                            $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
                    while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {
              
                      echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" }';
                 }
            }


            if($num_replies == 1) {


                 while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {
 
                  echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" }';
              
                }
              
                }


             echo']}';

       }else{
       
          echo'}';
             
    }




 }

   
       
echo ']}'; 
    
    

    }
    
    exit();
}



  ?>


