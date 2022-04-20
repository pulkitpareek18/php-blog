<?php
include "dbconnect.php";





// displaying total comments

if (isset($_GET['post_id'])) {
    $id = $_GET['post_id'];
    // $slug = $_GET['slug'];
    $sql_comments = "SELECT * FROM `comments` WHERE `comment_post_id`='$id' order by comment_id desc";

    $result_comments = mysqli_query($conn, $sql_comments);

    $num_comments = mysqli_num_rows($result_comments);
    $num_comments_second_last = $num_comments-1;

    $sql_comments = "SELECT * FROM `comments` WHERE `comment_post_id`='$id'  order by comment_id desc limit $num_comments_second_last ";
    $result_comments = mysqli_query($conn, $sql_comments);
    $sql_comments_last = "SELECT * FROM `comments` WHERE `comment_post_id`='$id'order by comment_id desc limit $num_comments_second_last, 1  ";
    $result_comments_last = mysqli_query($conn, $sql_comments_last);

    if ($num_comments>0) {
      
        
echo'{"arr":[';
        while ($row_comments=mysqli_fetch_assoc($result_comments)) {
            $comment_id =  $row_comments['comment_id'];



            $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

            $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
      
            $num_replies = mysqli_num_rows($result_replies_comments);



            echo'{"username":"'.$row_comments['username'].'", "comment_content":"'.$row_comments['comment_content'].'", "dates":"'.$row_comments['date'].'", "comment_id":"'.$row_comments['comment_id'].'" ,"num_replies":"'.$num_replies.'"';
              




// checking replies

    if ($num_replies>0) {


                echo' ,"comment_replies":[';

              if ($num_replies>1) {
                      $num_replies_second_last = $num_replies-1;
                      $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc  limit $num_replies_second_last";

                      $result_replies_comments = mysqli_query($conn, $sql_replies_comments);

                      while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {

                    echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" },';
                }


                      $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id  order by id desc limit $num_replies_second_last, 1";

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
          
          
          $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

          $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
    
          $num_replies = mysqli_num_rows($result_replies_comments);



            echo'{"username":"'.$row_comments['username'].'", "comment_content":"'.$row_comments['comment_content'].'", "dates":"'.$row_comments['date'].'", "comment_id":"'.$row_comments['comment_id'].'","num_replies":"'.$num_replies.'"';
          


         


// checking replies 22222222

if ($num_replies>0) {


            echo' ,"comment_replies":[';

          if ($num_replies>1) {
                  $num_replies_second_last = $num_replies-1;
                  $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc  limit $num_replies_second_last";

                  $result_replies_comments = mysqli_query($conn, $sql_replies_comments);

                  while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {

                echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'"},';
            }


                  $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id  order by id desc limit $num_replies_second_last, 1";

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
  $sql_comments = "SELECT * FROM `comments` WHERE `comment_post_id`='$id' & `username`='$username' order by comment_id desc limit 1";

  $result_comments = mysqli_query($conn, $sql_comments);

  $num_comments = mysqli_num_rows($result_comments);

  

  if ($num_comments>0) {
    
      
echo'{"arr":[';
      while ($row_comments=mysqli_fetch_assoc($result_comments)) {
          $comment_id =  $row_comments['comment_id'];



          $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

          $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
    
          $num_replies = mysqli_num_rows($result_replies_comments);



          echo'{"username":"'.$row_comments['username'].'", "comment_content":"'.$row_comments['comment_content'].'", "dates":"'.$row_comments['date'].'", "comment_id":"'.$row_comments['comment_id'].'" ,"num_replies":"'.$num_replies.'"';
            




// checking replies

  if ($num_replies>0) {


              echo' ,"comment_replies":[';

            if ($num_replies>1) {
                    $num_replies_second_last = $num_replies-1;
                    $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc  limit $num_replies_second_last";

                    $result_replies_comments = mysqli_query($conn, $sql_replies_comments);

                    while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {

                  echo'{"replier_username":"'.$row_replies_comments['username'].'", "reply_comment_content":"'.$row_replies_comments['reply_comment_content'].'", "dates":"'.$row_replies_comments['date'].'" },';
              }


                    $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id  order by id desc limit $num_replies_second_last, 1";

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





















            // $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

            // $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
      
            // $num_replies = mysqli_num_rows($result_replies_comments);

            // if ($num_replies>0) {
//                 echo'

//               <a disabled style="cursor: pointer;color: blue;" class="show_replies"  id="anchor'.$comment_id.'">Show '.$num_replies.' Replies</a>
              
              
//               <div style="display: none;" id="replies_container'.$comment_id.'">

              
              
//               ';

                // while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {
//                     echo '<h2 disabled class="form-control" style="display: block;
//                   width: 51%;
//                   padding: .375rem .75rem;
//                   font-weight: 400;
//                   line-height: 1.5;
//                   color: #495057;
//                   background-color: #fff;
//                   background-clip: padding-box;
//                   border: 1px solid #ced4da;
//                   border-radius: 21px;
//                   overflow: visible;
//                   margin: 20px;
//                   margin-left: 81px;"
                  
//                   >Replied By: '.$row_replies_comments['username'].'<br>
//                   '.$row_replies_comments['reply_comment_content'].'<br>
//                   Date: '.$row_replies_comments['date'].'</h2>';
//                 }

//                 echo'</div>';
//             }


//             echo'

//         <div class="mb-3">


//         <form  action="javascript:replyComment('.$comment_id.');" style="display: none;" id="reply'.$row_comments['comment_id'].'" >      
//         <input type="hidden" value="'.$comment_id.'" name="reply_comment_id">
//         <textarea  id="'.$comment_id.'" required minlength=5  type="text" placeholder="Reply to @'.$row_comments['username'].'" class="form-control" name="reply_comment"></textarea>
//         <button  type="submit" class="button " >Reply</button>

//         </form>      
   

//         </div>



//         <button  id="r'.$row_comments['comment_id'].'" class="button reply" >Add Reply</button>
         
     
//         <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
// <script src="js/comment.js"></script>
// <script src="js/script.js"></script>
//         ';
//         }
//     }

//     exit();
// }

// $sql_comments = "SELECT * FROM `comments` WHERE `comment_GET_id`='$id' order by comment_id desc";

// $result_comments = mysqli_query($conn, $sql_comments);

// $num_comments = mysqli_num_rows($result_comments);

//   if ($num_comments>0) {
//       echo '<h2>All Comments</h2>';

//       while ($row_comments=mysqli_fetch_assoc($result_comments)) {
//           $comment_id =  $row_comments['comment_id'];
//           echo'<h2 disabled class="form-control" style="display: block;
//         width: 51%;
//         padding: .375rem .75rem;
//         font-weight: 400;
//         line-height: 1.5;
//         color: #495057;
//         background-color: #fff;
//         background-clip: padding-box;
//         border: 1px solid #ced4da;
//         border-radius: 21px;
//         overflow: visible;
//         margin: 20px;"
        
//         >Posted By: '.$row_comments['username'].'<br>
//         '.$row_comments['comment_content'].'<br>
//         Date: '.$row_comments['date'].'</h2>
        
//         ';


//           $sql_replies_comments = "SELECT * FROM `reply_comments` WHERE `replied_comment_id`=$comment_id order by id desc";

//           $result_replies_comments = mysqli_query($conn, $sql_replies_comments);
      
//           $num_replies = mysqli_num_rows($result_replies_comments);

//           if ($num_replies>0) {
//               echo'
//               <a disabled style="cursor: pointer;color: blue;" class="show_replies"  id="anchor'.$comment_id.'">Show '.$num_replies.' Replies</a>
              
              
//               <div style="display: none;" id="replies_container'.$comment_id.'">

              
              
//               ';

//               while ($row_replies_comments=mysqli_fetch_assoc($result_replies_comments)) {
//                   echo '<h2 disabled class="form-control" style="display: block;
//                   width: 51%;
//                   padding: .375rem .75rem;
//                   font-weight: 400;
//                   line-height: 1.5;
//                   color: #495057;
//                   background-color: #fff;
//                   background-clip: padding-box;
//                   border: 1px solid #ced4da;
//                   border-radius: 21px;
//                   overflow: visible;
//                   margin: 20px;
//                   margin-left: 81px;"
                  
//                   >Replied By: '.$row_replies_comments['username'].'<br>
//                   '.$row_replies_comments['reply_comment_content'].'<br>
//                   Date: '.$row_replies_comments['date'].'</h2>';
//               }

//               echo'</div>';
//           }


//           echo'

//         <div class="mb-3">


//         <form  action="javascript:replyComment('.$comment_id.');" style="display: none;" id="reply'.$row_comments['comment_id'].'" >      
//         <input type="hidden" value="'.$comment_id.'" name="reply_comment_id">
//         <textarea  id="'.$comment_id.'" required minlength=5  type="text" placeholder="Reply to @'.$row_comments['username'].'" class="form-control" name="reply_comment"></textarea>
//         <button  type="submit" class="button " >Reply</button>

//         </form>      



//         </div>



//         <button  id="r'.$row_comments['comment_id'].'" class="button reply" >Add Reply</button>
         
      
//         <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
//         <script src="js/comment.js"></script>
//         <script src="js/script.js"></script>

        
        
//         ';
//       }
//   }


  ?>


