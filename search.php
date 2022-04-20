<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/videos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <title>iBlog - Video Search</title>
    <style>
        .hover {
            background: linear-gradient(45deg,
                    rgba(29, 236, 197, 0.5),
                    rgba(91, 14, 214, 0.5) 100%);
        }

        .hover :hover {

            background: rgb(193, 224, 209);
            ;


        }
    </style>
</head>

<body>
 
<?php include"includes/header_official.php"?>


    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="home-articles max-width-1 m-auto font2">
        <h1>Video Search</h1>
        <?php 
        
if(isset($_GET['search_query'])){
         
         $search_query = $_GET['search_query'];
        $search = $_GET['search_query'];
        $search_query = preg_replace("#[^0-9a-zA-Z]#i","",$search_query);
        $msc = microtime(true);

        include "dbconnect.php";

        $multiply = 0;
        $multiply_by = 0;

        $sql_search = "select * from `search`";
            $result_search = mysqli_query($conn,$sql_search);
            $row_search = mysqli_fetch_assoc($result_search);
            $max_post = $row_search['max_post'];  


                if(isset($_GET['number'])){


                    $multiply_by = $_GET['number'];

                }

                    $sql_search = "select * from `search`";
                    $result_search = mysqli_query($conn,$sql_search);
                    $row_search = mysqli_fetch_assoc($result_search);
                    $max_post = $row_search['max_post'];  
                    $multiply = ($max_post*$multiply_by);

                    //counting all matching rows
                    $sql_num = "SELECT * from `playlist` where content like '%$search_query%' or title like '%$search_query%'";
                    $result_num = mysqli_query($conn, $sql_num);
                    $num_total_matched_posts = mysqli_num_rows($result_num);


        

      

        
        
        

        
                        

                            //displaying matching rows with a limit 
                            $sql = "SELECT * from `playlist` where content like '%$search_query%' or title like '%$search_query%' limit $multiply , $max_post ";
                            $result = mysqli_query($conn, $sql);
                            $total_diff = microtime(true)-$msc;


                            $num = mysqli_num_rows($result);
                            echo'<h2 class="m-2 p-2 alert-success" style="border-radius:11px;">&nbsp Search Results for '.$search.' ('.$total_diff .' seconds)</h2><hr>';

                            if ($num > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                    
                                    $title = $row['title'];
                                    $content = $row['content'];
                                    $slug = $row['slug'];
                                    $content = substr($content, 0, 251)."...";
                                    // echo'
                            
                        
                                    // <div class="home-article">
                                    //     <div class="home-article-img">
                                    //     <a href="/blog/video.php?slug='.$slug.'"> <img src="img/logo.png" alt="article"></a>
                                    //     </div>
                                    //     <div class="home-article-content font1">
                                    //         <a style="text-decoration: none" href="/blog/video.php?slug='.$slug.'"><h3>'.$title.'</h3></a>
                                            
                                            
                                            
                                    //     </div>
                                    // </div><hr>';

                                    echo' 
                                    <section>
                                
                                    <div  style="
                                    background: linear-gradient(
                                    45deg,
                                    rgba(29, 236, 197, 0.5),
                                    rgba(91, 14, 214, 0.5) 100%
                                    );
                                "  class="   alert alert-success m-3 " role="alert"  >
                                
                                    
                                    <h4 class="alert-heading"><img style="text-decoration: none;width: 70px" src="img/logo.png" alt="article">'.$title.' </h4>
                                
                                    <hr>
                                    <p class="mb-0">'.$content.'</p>
                                    <a class="btn btn-outline-danger" style="text-decoration: none" href="/blog/video.php?slug='.$slug.'">Read More</a>
                                    </div></section>';
                                    
                                }
                            }if($num_total_matched_posts>$max_post){
                                if($num_total_matched_posts>$multiply){
                                  if($multiply_by >0){
                                      $multiply_by_prev = $multiply_by-1;
                                  }elseif($multiply_by<=0){
                                        echo'<style> #previous{display: none;} </style>';
                                    $multiply_by_prev=0;
                                  
                                    
                                  }
                                  echo '<div style="text-align: left;"><a class="btn btn-danger "  id="previous" href="/blog/search.php?search_query='.$search.'&number='.$multiply_by_prev.'"><- Previous</a></div>';
                        
                        
                                    if($multiply_by>=0){
                                       $next_condition= $max_post*($multiply_by+1);
                        
                                    if($num_total_matched_posts-$next_condition>0)  {
                        
                                        $multiply_by_next = $multiply_by+1;
                        
                        
                        
                                    } else{
                                        echo'<style> #next{display: none;} </style>';
                                        $multiply_by_next= $multiply_by;     
                        
                                    }         
                                    echo '<div style="text-align: right;"><a class="btn btn-danger mt-0 "  id="next" href="/blog/search.php?search_query='.$search.'&number='.$multiply_by_next.'">Next -></a></div>';
                        
                                    }
                        
                                }
                            }

                                if($num==0){
                                    echo'<div style="margin: 100px;" class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Result Not Found!</h4>
                                    <p</p>
                                    <hr>
                                    <p class="mb-0">No results found for your query.</p>
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