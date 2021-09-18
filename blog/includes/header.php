<!DOCTYPE HTML>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/videos.css">
  <body >
<nav class="navbar mb-0 navbar-expand-lg navbar-dark bg-dark" style="padding-bottom: 0">
  <a class="navbar-brand" href="/blog/"><img src="/blog/img/logo.png" class="m-0" height="47px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div  class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/blog/">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/blog/blog.php">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/blog/video.php">Video</a>
      </li>
<li class="nav-item">
        <a class="nav-link" href="/blog/contact.php">Contact Us</a>
      </li>

    </ul>

    <form class="form-inline my-2 my-lg-0" action="/blog/bsearch.php" method="get">
      <input pattern="[^*()/><\][\\\x22,;.|]+" required class="form-control mr-sm-2" type="search" name="search_query" placeholder="Article Search" aria-label="Search">
      <button style="margin-right: 21px;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <form class="form-inline my-2 my-lg-0 mr-2" action="/blog/search.php" method="get">
      <input pattern="[^*()/><\][\\\x22,;.|]+" required class="form-control mr-sm-2" type="search" name="search_query" placeholder="Video Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class=" form-inline">

      <!-- turning visible and invisible login and signup button on basis of session -->

      <?php

          session_start();

          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

              $loggedin= true;

          } else {

              $loggedin = false;

          }
                
          

      if ($loggedin==false) {

      //login button

          echo '<a class="btn btn-danger mr-1" href="login.php">Login</a>';

          //signup button

          echo '<a class="btn btn-danger mr-1" href="signup.php">Signup</a>';


      };

      if ($loggedin) {

      //logout button


          echo '<a class="btn btn-danger mr-1" href="activities/logout.php">Logout</a>';


      };
      ?>


    </div>
  </div>
</nav>
</body>