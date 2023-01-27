<?php include "activities/variables.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $home_url ?>css/design.css">
    <link rel="stylesheet" href="<?php echo $home_url ?>css/responsive.css">
    <link rel="shortcut icon" href="<?php echo $home_url ?>img/logo.png" type="image/x-icon">
    <title>iBlog-Videos</title>
</head>

<body>
    <!-- Navbar -->
    <?php include "./activities/variables.php" ?>
    <?php include "includes/header.php"; ?>
    <?php include "dbconnect.php"; ?>
    <?php include "functions.php"; ?>
    <div class="cardContainer">
        <?php

        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $category_name = $row['category_name'];
            $category_id = $row['category_id'];
            $category_description = $row['category_description'];
            $image_url = $row['image_url'];
            $category_slug = $row['category_slug'];
            $hidden = $row['hidden'];
            // fetching slug which is the first video in this playlist
            $sql_new="SELECT * FROM `playlist` WHERE `category_id`=$category_id AND hidden=0 ORDER by id ASC";
            $result_new = mysqli_query($conn, $sql_new);
            $num = mysqli_num_rows($result_new);
            if($num>0){    
            $row_new = mysqli_fetch_assoc($result_new);
            $category_slug=$row_new["slug"];
            if($hidden==0){
                        echo '
                <a href="'.$home_url.'play/'.$category_slug.'">
                  <li class="card">
                    <img src="' . $image_url . '" alt="">
                    <p>' . $category_name . '</p>
                  </li>
                </a>';
              }else{}
            }
                    }

        ?>

    </div>
</body>

</html>