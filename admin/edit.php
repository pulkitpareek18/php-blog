<?php
include "loginCheck.php";
include "../includes/variables.php";
include "../dbconnect.php";
include "backend.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $home_url; ?>css/prism.css">
  <script src="jquery.js"></script>
  <title>iBlog-Admin</title>
</head>
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

  <?php
  $row;
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `playlist` where id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }

  ?>

  <!-- All Data -->
  <div class="allData  d-flex flex-column justify-content-center align-items-center">
    <h1 class="">iBlog Admin</h1>
    <hr>

    <!-- Edit Video -->

    <div class="container my-4">
      <h2>Edit Video</h2>
      <form method="post" action="backend.php" id="updateVideo">
        <input type="hidden" value="<?php echo $row['id'] ?>" class="form-control" name="id_edit" aria-describedby="emailHelp">
        <div class="form-group">
          <label for="title">Title</label>
          <input required value="<?php echo $row['title'] ?>" type="text" class="form-control" id="title_edit" name="title_edit" aria-describedby="emailHelp">
        </div>
        <div class="form-check">
          <input class="form-check-input" name="hidden" type="hidden" value="0" id="flexCheckChecked">
          <?php
          if ($row['hidden'] == 1) {
            echo '<input class="form-check-input" checked id="hidden" name="hidden" type="checkbox" value="1">';
          } else {
            echo '<input class="form-check-input" id="hidden" name="hidden" type="checkbox" value="1">';
          }
          ?>
          <label class="form-check-label font-weight-bold" for="flexCheckChecked">Hidden</label>
        </div>
        &nbsp;
        <div class="form-group">
          <label for="title">Player Url</label>
          <input type="url" value="<?php echo $row['player_url'] ?>" class="form-control" name="url" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="title">Thumbnail Url</label>
          <input type="url" value="<?php echo $row['thumbnail'] ?>" class="form-control" name="imageUrl" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="desc">Content</label>
          <script src="https://cdn.tiny.cloud/1/nx0uoh7aaxh6tv2scp44nyotk4lpnwkuqva8pkyhinqvqafu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
          </head>
          <textarea id="txt" name="content" rows="25"><?php echo $row['content'] ?></textarea>
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
          <option selected value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
          <?php
          //If video unlisted it will not have any category id
          if (empty($row['category_id'])) {
            $sql = "SELECT * FROM `category`";
          } else { //If video not unlisted
            $selected_category_id = $row['category_id'];
            $sql = "SELECT * FROM `category` where category_id NOT LIKE $selected_category_id";
          }

          $result = mysqli_query($conn, $sql);
          while ($row_category = mysqli_fetch_assoc($result)) {
            $category_name = $row_category['category_name'];
            $cat_id = $row_category['category_id'];
            echo '  <option value="' . $cat_id . '">' . $category_name . '</option>';
          }
          //If video has already a category selected then show the unlisted option at last
          if (!empty($row['category_id'])) {
            echo '<option value="">Unlisted</option>';
          }
          ?>
        </select>
        <div class="form-group">
          <label for="title">Meta Description</label>
          <textarea type="text" rows="5" class="form-control p-0" name="description" aria-describedby="emailHelp"><?php echo $row['meta_description'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="title">Meta Keywords</label>
          <textarea type="text" rows="3" class="form-control p-0" name="keywords" aria-describedby="emailHelp"><?php echo $row['meta_keywords'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="title">Slug</label>
          <input required value="<?php echo $row['slug'] ?>" type="text" class="form-control" name="slug" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
  </div>
  <hr>
  <script src="admin.js"></script>
<script src="<?php echo $home_url; ?>js/prism.js"></script>
</body>

</html>