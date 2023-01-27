<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include "activities/variables.php";
include "includes/header.php";
include "dbconnect.php";
include "functions.php";
?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $home_url ?>css/design.css">
    <link rel="stylesheet" href="<?php echo $home_url ?>css/responsive.css">
    <link rel="stylesheet" href="<?php echo $home_url ?>css/landingPage.css">

    <style>
        .wrap {
            height: min-content;
        }

        @keyframes blinkTextCursor {
            from {
                border-right-color: rgba(0, 0, 0);
            }
            to {
                border-right-color: transparent;
            }
        }

        .wrap {
            animation: blinkTextCursor 250ms infinite normal;
        }
    </style>

    <title>iBlog</title>
</head>

<body>
    <div class="landingPage">
    <span class="anim-typewriter txt-rotate" data-period="2000" data-rotate='[ "Welcome to iBlog.", "You can explore here", "videos.", "articles etc.", "and increase your knowledge" ]'></span>
    <a href="<?php echo $home_url ?>video">Browse Videos</a>
    <img src="img/bg.jpg" alt="">
    </div>
    <script src="js/script.js"></script>
</body>
</html>
<?php  ?>