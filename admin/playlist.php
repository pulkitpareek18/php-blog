<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <script src="jquery.js"></script>  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  <title>iBlog-Admin</title>
</head>
<?php include "../activities/variables.php" ?>
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
<div class="allData  d-flex flex-column justify-content-center align-items-center">
  <h1 class="font-weight-bold">iBlog Admin</h1>
  <hr>

  <!-- Create Playlist -->

<div class="container">
  <form action="backend.php" id="createPlaylist" method="POST">
    <h2>Create Playlist</h2>

    <div class="form-group">
      <label for="">Category Name</label>
      <input type="text" required class="form-control" name="playlist">
    </div>
    <div class="form-check">
        <input class="form-check-input" name="hidden" type="hidden" value="0"> 
        <input class="form-check-input" id="hidden" name="hidden" type="checkbox" value="1">
        <label class="form-check-label font-weight-bold" for="flexCheckChecked">Hidden</label>
    </div>    
    &nbsp;
    <div class="form-group">
      <label for="">Category Description </label>
      <textarea type="text" style="height: 200px" class="form-control" name="description"></textarea>
    </div>
    <!-- <div class="form-group">
      <label for="">Category Url</label>
      <input type="url" required class="form-control" name="url">
    </div> -->
    <div class="form-group">
      <label for="">Image Url</label>
      <input type="url" class="form-control" name="img">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Create Playlist</button>
  </form>
</div>


<hr>

<!-- All Playlist Edit and Hide -->
<h2>All Playlists</h1>

  <table class="table" id="categoryList">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Playlist Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
          $sql = "SELECT * FROM `category`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          $function;
          $text;
          while ($row = mysqli_fetch_assoc($result)) 
          {
            // If Playlist Not Hidden
            if($row['hidden']==0){
                $function="hidePlaylist(".$row['category_id'].",\"".$row['category_name']."\")";
                $text="Hide";
                }else{
                  // If Playlist Hidden
                  $function="unhidePlaylist(".$row['category_id'].",\"".$row['category_name']."\")";
                  $text="Un-Hide"; 
                }
                $sno = $sno + 1;
                echo "<tr>
                      <th scope='row'>" . $sno . "</th>
                      <td>" . $row['category_name'] . "</td>
                      <td><div class='d-flex flex-align-center justify-content-start'><a class='edit btn btn-sm btn-primary' href='".$home_url."admin/playlistedit.php?id=".$row['category_id']."'>Edit</a>
                          <button onClick='".$function."'class='delete ml-2 btn btn-sm btn-danger'>".$text."</button></td></div>
                      </tr>";
            
          }
          ?>

    </tbody>
  </table>
  </div>

  </div>

  <hr/>
<script src="admin.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
      $('categoryList#').DataTable();

    });
  </script>
</body>

</html>