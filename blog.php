<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/videos.css">
    <link rel="stylesheet" href="css/blogList.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>iBlog</title>
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

</head>
<style>

.pace{-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}.pace-inactive{display:none}.pace .pace-progress{background:#ff000d;position:fixed;z-index:2000;top:0;right:100%;width:100%;height:3px}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<body>
<?php require "includes/header_official.php"; ?>


<div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="m-auto content max-width-1 my-2">
        <div class="content-left">
            <h1>iBlog</h1>
            <p>iBlog is a website which lets you submit an article which upon approval will be up on our website and you
                can get a good amount of reach from here!</p>
            <p>My Halloween decorations are staying in the box this year. To be honest, they didn’t make it out of the
                box last year either. My Halloween spirit has officially been bludgeoned to death by teenagers who no
                longer care and a persistent October fear of the Northern California wildfires. And speaking of fear,
                isn't there more than enough of that going around? Maybe all of us can pretend that Halloween isn’t even
                happening this year?</p>
        </div>
        <div style="width:100%" class="content-right">
            <img src="img/home.svg" alt="iBlog">
        </div>
    </div>

    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="home-articles max-width-1 m-auto font2">
        <h2>Featured Articles</h2>
       

        <?php 
        


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
                    $sql_num = "SELECT * from `blogpost` ";
                    $result_num = mysqli_query($conn, $sql_num);
                    $num_total_matched_posts = mysqli_num_rows($result_num);


        

      

        
        
        

        
                        

                            //displaying matching rows with a limit 
                            $sql = "SELECT * from `blogpost` order by id desc limit $multiply , $max_post ";
                            $result = mysqli_query($conn, $sql);
                           


                            $num = mysqli_num_rows($result);
                         

                            if ($num > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                    
                                    $title = $row['title'];
                                    $content = $row['content'];
                                    $slug = $row['slug'];
                                    $meta_description = $row['meta_description'];
                                    $content = substr($content, 0, 90)."...";
                                    // echo'
                            
                        
                                    // <div class="home-article">
                                    //     <div class="home-article-img">
                                    //     <a href="/blog/video.php?slug='.$slug.'"> <img src="img/logo.png" alt="article"></a>
                                    //     </div>
                                    //     <div class="home-article-content font1">
                                    //         <a style="text-decoration: none" href="/blog/video.php?slug='.$slug.'"><h3>'.$title.'</h3></a>
                                            
                                            
                                            
                                    //     </div>
                                    // </div><hr>';

                                    $image_url = $row['image_url'];
                                    if(strlen($image_url)>1){
                                        echo' <section>
                                        
                                        <div class="card mb-3" style="max-width: 90vw;">
                                        <div id="blog-list-content" class="row g-0">
                                        <div class="col-md-4" style="margin: auto; display: flex; vertical-align: middle;justify-content: center;">
                                        <img src="'.$image_url.'" class="img-thumbnail-apna rounded-start" alt="Post Thumbnail" >
                                          </div>
                                          <div class="col-md-8-apna" style="display: flex;align-items: center;">
                                            <div class="card-body card-body-apna">
                                              <h5 class="card-title">'.$title.'</h5>
                                              <p class="card-text">'.$meta_description.'</p>
                                              <span class="inline-flex">
                                              <a href="'.$home_url.'blogpost/'.$slug.'" class="btn  btn-outline-danger ">Read More</a>
                                            </span>     
                                          </div>
                                          </div>
                                        </div>
                                      </div>
</section>';
                            
                                    }else{

                                    echo' 
                                    <section>
                                    <div class="card mb-3" style="max-width: 90vw;">
                                    <div id="blog-list-content" class="row g-0">
                                    <div class="col-md-4" style="margin: auto; display: flex; vertical-align: middle;justify-content: center;">
                                    <img src="img/logo.png" class="img-thumbnail-apna rounded-start" alt="Post Thumbnail">
                                      </div>
                                      <div class="col-md-8-apna" style="display: flex;align-items: center;">
                                        <div class="card-body card-body-apna">
                                          <h5 class="card-title">'.$title.'</h5>
                                          <p class="card-text">'.$meta_description.'</p>
                                          <span class="inline-flex">
                                          <a href="'.$home_url.'blogpost/'.$slug.'" class="btn  btn-outline-danger ">Read More</a>
                                        </span>     
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                        </section>';
                                    }
                                    
                                    
                                }
                            }if($num_total_matched_posts>$max_post){
                                if($num_total_matched_posts>$multiply){
                                  if($multiply_by >0){
                                      $multiply_by_prev = $multiply_by-1;
                                  }elseif($multiply_by<=0){
                                        echo'<style> #previous{display: none;} </style>';
                                    $multiply_by_prev=0;
                                  
                                    
                                  }
                                  echo '<div style="text-align: left;"><a class="btn btn-danger "  id="previous" href="/blog/index.php?&number='.$multiply_by_prev.'"><- Previous</a></div>';
                        
                        
                                    if($multiply_by>=0){
                                       $next_condition= $max_post*($multiply_by+1);
                        
                                    if($num_total_matched_posts-$next_condition>0)  {
                        
                                        $multiply_by_next = $multiply_by+1;
                        
                        
                        
                                    } else{
                                        echo'<style> #next{display: none;} </style>';
                                        $multiply_by_next= $multiply_by;     
                        
                                    }         
                                    echo '<div style="text-align: right;"><a class="btn btn-danger mt-0 "  id="next" href="/blog/index.php?number='.$multiply_by_next.'">Next -></a></div>';
                        
                                    }
                        
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
