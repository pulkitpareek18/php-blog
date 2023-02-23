<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../css/responsive.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css">    <script src="jquery.js"></script>
    <script src="admin.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <title>iBlog-Admin</title>
</head>
<?php include "../includes/variables.php" ?>
<?php include "../dbconnect.php" ?>
<style>
    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none
    }

    .pace-inactive {
        display: none
    }

    .pace .pace-progress {
        background: #102a9b;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 100%;
        width: 100%;
        height: 3px
        
    }

    a{
    cursor: pointer;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<!-- Header -->
<nav>
  <div id="nav">
    <img src="<?php echo $home_url; ?>img/logo.png" alt="">
    <div id="navInside">
      <a href="<?php echo $home_url ?>">
        <li>Home</li>
      </a>
      <a href="<?php echo $home_url ?>admin/">
        <li>Video Admin</li>
      </a>
      <a href="<?php echo $home_url ?>admin/playlist.php">
        <li>Playlist Admin</li>
      </a>
      <a href="<?php echo $home_url ?>video">
        <li>Video Page</li>
      </a>
    </div>
  </div>
</nav>

<div style="margin-top: 14vh;" class="container">
<form class="m-g mt-5 " method="post" action="backend.php">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Category</th>
                <th scope="col">Position</th>
                <th scope="col">Move</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Select all categories ordered by position
            $sql = "SELECT * FROM category ORDER BY position";
            $result = mysqli_query($conn, $sql);
            $index = 1;
            // Loop through each category
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <th scope="row"><?php echo $index; ?></th>
            <td class="font-weight-bold" scope="row"><?php echo $row['category_name']; ?></td>
            <td scope="row"><?php echo $row['position']; ?></td>
            <td scope="row">
                <button type="submit" name="move_up" value="<?php echo $row['category_id']; ?>"><i class="fa fa-2x fa-arrow-up"></i></button>
                <button type="submit" name="move_down" value="<?php echo $row['category_id']; ?>"><i class="fa fa-2x fa-arrow-down"></i></button>
            </td>
        </tr>
        <?php $index++; } ?>
        </tbody>
    </table>
</form></div>
<style>button {
  border: none;
  background-color: transparent;
  outline: none;
}
</style>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
   

</html>


