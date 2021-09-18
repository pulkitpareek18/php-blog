<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/videos.css">
    <title>iBlog - Heaven for bloggers</title>
</head>
<style>

.pace{-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}.pace-inactive{display:none}.pace .pace-progress{background:#ff000d;position:fixed;z-index:2000;top:0;right:100%;width:100%;height:3px}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<?php  

include "dbconnect.php";
if(isset($_POST['name'])){
   $name = $_POST['name'];
   $phoneno = $_POST['phoneno'];
   $email = $_POST['email'];
   $concern = $_POST['concern'];

   $sql= "INSERT INTO  `contact` (`name` , `phoneno` , `email` , `concern`) VALUES ('$name' , '$phoneno' , '$email' ,'$concern')";
   $result = mysqli_query($conn,$sql);
   if($result){
       echo'<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
       integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 ';
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> We have submitted your response our team will contact you as soon as possible
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
   }else{
    echo'<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
';
 echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
 <strong>Error!</strong> An Error ocuured
 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
   <span aria-hidden='true'>×</span>
 </button>
</div>";
   }
}


?>

<body>
    
<nav style="margin-top: 51px" class="navigation max-width-1 ">
        <div class="nav-left">
            <a style="margin-left: 151px" href="/">
                <span><img src="img/logo.png" width="94px" alt=""></span>
            </a>
            <ul style="padding: 0px;margin: 0px;">
            <ul>
                <li><a href="http://localhost/blog">Home</a></li>
                <li><a href="http://localhost/blog/">Blog</a></li>
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
    <div class="contact-content font1 max-width-1 m-auto">
        <div class="max-width-1 m-auto mx-1">
            <h2>Feel Free to Contact Us</h2>
            <form action="/blog/contact.php" method="post">
            <div class="contact-form">
                <div class="form-box">
                    <input name="name" type="text" placeholder="Enter Your Name">
                </div>
                <div class="form-box">
                    <input name="phoneno" type="tel" placeholder="Enter Your Phone Number">
                </div>
                <div class="form-box">
                    <input name="email" type="email" placeholder="Enter Your Email Id">
                </div>
                <div class="form-box">
                    <textarea style="margin-bottom: 0px" name="concern" id="" cols="30" rows="10" placeholder="How may we help you?"></textarea>
                </div>
                
                    <button style="margin-bottom: 51px;margin-top: 0px;" type="submit" class="button">Submit</button>
                
            </form>
            </div>
        </div>

    </div>
 
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

    <div class="footer-video ">
        
        <br>
                <p>Copyright &copy; iBlog.com </p>
            
            
            </div>
</body>
</html>