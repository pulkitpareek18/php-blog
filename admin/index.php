<?php 
include "../activities/variables.php";
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
  <link rel="stylesheet" href="<?php echo $home_url; ?>css/prism.css">
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
<nav style="z-index: 1;">
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
<body>
<!-- All Data -->
<div class="allData  d-flex flex-column justify-content-center align-items-center">
  <h1 class="font-weight-bold">iBlog Admin</h1>
  <hr>

  <!-- Add Video -->

  <div class="container my-4">
    <h2>Add Video</h2>
    <form id="addVideo" method="post" action="backend.php">
      <div class="form-group">
        <label for="title">Title</label>
        <input required type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>
      <div class="form-check">
        <input class="form-check-input" name="hidden" type="hidden" value="0">
        <input class="form-check-input" id="hidden" name="hidden" type="checkbox" value="1">
        <label class="form-check-label font-weight-bold" for="flexCheckChecked">Hidden</label>
      </div>
      &nbsp;
      <div class="form-group">
        <label for="title">Player Url</label>
        <input type="url" class="form-control" name="url" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="title">Thumbnail Url</label>
        <input type="url" class="form-control" name="imageUrl" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="desc">Content</label>
        <script src="https://cdn.tiny.cloud/1/nx0uoh7aaxh6tv2scp44nyotk4lpnwkuqva8pkyhinqvqafu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        </head>
        <textarea id="txt" name="content" rows="25"></textarea>
        <script>
          tinymce.init({
            selector: '#txt',
            plugins: 'anchor code autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo code redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Pulkit Pareek',
          });
        </script>
      </div>
      <label for="category">Playlist</label>
      <select placeholder="Choose..." class="custom-select my-1 mr-sm-2" name="catid" id="inlineFormCustomSelectPref">
        <option value=""></option>
        <?php
        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($conn, $sql);
        while ($row_category = mysqli_fetch_assoc($result)) {
          $category_name = $row_category['category_name'];
          $cat_id = $row_category['category_id'];
          echo '  <option value="' . $cat_id . '">' . $category_name . '</option>';
        }
        ?>
      </select>
      <div class="form-group">
        <label for="title">Meta Description</label>
        <textarea type="text" rows="5" class="form-control p-0" name="meta_description" aria-describedby="emailHelp"></textarea>
      </div>
      <div class="form-group">
        <label for="title">Meta Keywords</label>
        <textarea type="text" rows="3" class="form-control p-0" name="meta_keywords" aria-describedby="emailHelp"></textarea>
      </div>
      <div class="form-group">
        <label for="title">Slug</label>
        <input required type="text" class="form-control" name="slug" aria-describedby="emailHelp">
      </div>
      <button type="submit"  class="btn btn-primary">Add</button>
      </div>
    </form>
</div>
<hr>

<!-- Listing Videos -->
<div class="container my-4">
    <h2>All Videos</h1>
      <table class="table" id="videoList">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Visit</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `playlist`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          $function;
          $text;
          while ($row = mysqli_fetch_assoc($result)) 
          {
            // If Video Not Hidden
            if($row['hidden']==0){
                $function="hideVideo(".$row['id'].",\"".$row['title']."\")";
                $text="Hide";
                }else{
                  // If Video Hidden
                  $function="unhideVideo(".$row['id'].",\"".$row['title']."\")";
                  $text="Un-Hide"; 
                }
                $sno = $sno + 1;
                echo "<tr>
                      <th scope='row'>" . $sno . "</th>
                      <td>" . $row['title'] . "</td>
                      <td>" . $row['category_name'] . "</td>
                      <td><a class='edit btn btn-sm btn-success' target ='_blank' href='".$home_url."play/".$row['slug']."'>Visit</a></td>
                      <td><div class='d-flex flex-align-center justify-content-start'><a class='edit btn btn-sm btn-primary' href='".$home_url."admin/edit.php?id=".$row['id']."'>Edit</a>
                          <button onClick='".$function."'class='delete ml-2 btn btn-sm btn-danger'>".$text."</button></td></div>
                      </tr>";
            
          }
          ?>
        </tbody>
      </table>
  </div>


  <script src="admin.js"></script>
  <script src="<?php echo $home_url; ?>js/prism.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
      $('#videoList').DataTable();

    });
  </script>
</body>

</html>