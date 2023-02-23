<?php include "includes/variables.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $home_url ?>css/design.css">
  <link rel="stylesheet" href="<?php echo $home_url ?>css/responsive.css">
  <link rel="shortcut icon" href="<?php echo $home_url ?>img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo $home_url; ?>includes/style.css">
  <script src="<?php echo $home_url; ?>js/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/fuse.js@6.6.2"></script>
  <title>iBlog-Courses</title>
  <?php echo $gtag; ?>
</head>

<body>
  <!-- Navbar -->
  <?php include "includes/header.php"; ?>
  <?php include "dbconnect.php"; ?>
  <?php include "includes/functions.php"; ?>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <a id="closeSidebar"><img src="<?php echo $home_url ?>img/close-button-icon.svg" alt=""></a>
    <img src="<?php echo $home_url; ?>img/logo.png" alt="">
    <a href="">
      <li>Home</li>
    </a>
    <a href="<?php echo $home_url ?>video">
      <li>Courses</li>
    </a>
    <a href="<?php echo $home_url ?>play/terms-and-conditions">
      <li>Terms & Conditions</li>
    </a>
    <a href="<?php echo $home_url ?>play/privacy-policy">
      <li>Privacy Policy</li>
    </a>
  </div>

  <!-- All Playlists -->
  <div class="cardContainer">
    <?php
    $sql = "SELECT * FROM `category` ORDER by position ASC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

      $category_name = $row['category_name'];
      $category_id = $row['category_id'];
      $category_description = $row['category_description'];
      $image_url = $row['image_url'];
      $category_slug = $row['category_slug'];
      $hidden = $row['hidden'];
      // fetching slug which is the first video in this playlist
      $sql_new = "SELECT * FROM `playlist` WHERE `category_id`=$category_id AND hidden=0 ORDER by position ASC";
      $result_new = mysqli_query($conn, $sql_new);
      $num = mysqli_num_rows($result_new);
      if ($num > 0) {
        $row_new = mysqli_fetch_assoc($result_new);
        $category_slug = $row_new["slug"];
        if ($hidden == 0) {
          echo '
                <a href="' . $home_url . 'play/' . $category_slug . '">
                  <li class="card">
                    <img src="' . $image_url . '" alt="">
                    <p>' . $category_name . '</p>
                  </li>
                </a>';
        } else {
        }
      }
    }

    ?>

  </div>

</body>
<script src="<?php echo $home_url; ?>includes/js/script.js"></script>

</html>