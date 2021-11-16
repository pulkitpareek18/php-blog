<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/videos.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
<nav style="margin-top: 51px" class="navigation max-width-1 ">
        <div class="nav-left">
            <a style="margin-left: 151px" href="/blog/">
                <span><img src="img/logo.png" style="max-width: 94px" width="94px" alt=""></span>
            </a>
            <ul  style="padding: 0px;margin: 0px;">
            <ul>
                <li><a href="http://localhost/blog">Home</a></li>
                <li><a href="http://localhost/blog/blog.php">Blog</a></li>
                <li><a href="http://localhost/blog/video.php">Video</a></li>
                <li><a href="http://localhost/blog/contact.php">Contact</a></li>
            </ul>
            </ul>
        </div>
        
        <div style="text-align: center" class="nav-right ">
            <form action="/blog/search.php" method="get">
                <input  pattern="[^*()/><\][\\\x22,;.|]+" required class="form-input" type="text" name="search_query" placeholder="Video Search">
                <button class=" button">Search</button>
            </form>

        </div>
        <div  style="text-align: center" class="nav-right">
            <form action="/blog/bsearch.php" method="get">
                <input  pattern="[^*()/><\][\\\x22,;.|]+" required class="form-input" type="text" name="search_query" placeholder="Article Search">
                <button class="button">Search</button>
            </form>

        </div>

    </nav>
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
                isn’t there more than enough of that going around? Maybe all of us can pretend that Halloween isn’t even
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
                                        <div style="background-color: rgb(238, 238, 238);" class="flex m-2 mb-4 rounded border  flex-wrap -m-4">
      <div  class="p-4 w-100 lg:w-1/2">
        <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
          <img alt="team" class="flex-shrink-0 rounded-lg  object-cover object-center " src="'.$image_url.'">
          <div class="flex-grow sm:pl-8">
            <h3 class=" mb-3">'.$title.'</h3>
            <p class="mb-4">'.$meta_description.'</p>
            <span class="inline-flex">
              <a href="/blog/blogpost.php?slug='.$slug.'" class="btn  btn-outline-danger ">Read More</a>
            </span>
          </div>
        </div>
      </div></div></section>';
                            
                                    }else{

                                    echo' <section ><div style="background-color: rgb(238, 238, 238);" class="flex m-2 mb-4 rounded border  flex-wrap -m-4">
                                    <div  class="p-4 w-100 lg:w-1/2">
                                      <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="img/logo.png">
                                        <div class="flex-grow sm:pl-8">
                                          <h3 class=" mb-3">'.$title.'</h3>
                                          <p class="mb-4">'.$meta_description.'</p>
                                          <span class="inline-flex">
                                          <a href="/blog/blogpost.php?slug='.$slug.'" class="btn  btn-outline-danger ">Read More</a>

                                          </span>
                                        </div>
                                      </div>
                                    </div></div></section>';}
                                    
                                    
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