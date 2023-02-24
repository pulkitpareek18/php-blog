<?php 
include "../includes/variables.php";
session_start();

          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

              $loggedin= true;

          } else {

              $loggedin = false;

          }

        if($_SESSION['username']=="admin"){

        }else{
          header('Location: '.$home_url.'video.php');
          exit();
        }  

?>