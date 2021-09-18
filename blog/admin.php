<?php  
$delete_pl = false;
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;
$update_pl = false;
$delete = false;
$playlist = false;
$deleteb = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";

if(isset($_GET['update_pl'])){
  $update_pl = $_GET['update_pl'];
}

if($update){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your video has been updated successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
</div>";}
if($update_pl){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your playlist has been updated successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
</div>";}

if($playlist){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your playlist has been created successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
</div>";}
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `playlist` WHERE `id` = $sno";
  $result = mysqli_query($conn, $sql);
}

if(isset($_GET['deleteb'])){
  $sno = $_GET['deleteb'];
  $deleteb = true;
  $sql = "DELETE FROM `blogpost` WHERE `id` = $sno";
  $result = mysqli_query($conn, $sql);
}


//delete playlist

if(isset($_POST['delete_playlist'])){
  $delete_playlist_id = $_POST['delete_playlist'];
    $sql = "DELETE FROM `category` WHERE `category_id` = $delete_playlist_id";
    $sql_pl = "DELETE FROM `playlist` WHERE `category_id` = $delete_playlist_id";
    $result = mysqli_query($conn, $sql);
    $result_pl = mysqli_query($conn, $sql_pl);
    $delete_pl = true;
}


if(isset($_POST['playlist'])){
  $playlist_name = $_POST['playlist'];
  $playlist_desc = $_POST['description'];
  $playlist_url = $_POST['url'];
  $image_url = $_POST['img'];
 
  $sql_pl = "INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_url` , `image_url`) VALUES (NULL, '$playlist_name', '$playlist_desc', '$playlist_url' , '$image_url')";
  $result_pl = mysqli_query($conn, $sql_pl);
  if($result_pl){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your playlist has been created successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>"; 
    $playlist = true;
  }else{
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Your playlist has not created successfully due to this error -->".mysqli_error($conn)."
     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
}
if(isset($_GET['update'])){
 $update = $_GET['update'];
  
}

if($delete_pl){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your playlist has been deleted successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
</div>";}
if (isset( $_POST['title'])){
    $title = $_POST["title"];
    $content = $_POST["content"];
    //TO INSERT ANY TYPE OF CONTENT LIKE SOURCE CODE
    $content = mysqli_real_escape_string($conn,$content);
    
    $category = $_POST["catid"];
    $slug = $_POST["slug"];
    $url = $_POST["url"];
    $meta_description = $_POST["meta_description"];
    $meta_keywords = $_POST["meta_keywords"];
    $url = str_replace("watch?v=" , "embed/" , $url);
    $sql = "SELECT * FROM `category` where category_id = $category";
    $result = mysqli_query($conn,$sql);
    while($row_category = mysqli_fetch_assoc($result)){
      $cat_name = $row_category['category_name'];
    }
  // Sql query to be executed
  $sql = "INSERT INTO `playlist` (`title`, `content` , `category_id` , `slug` , `category_name` , `player_url` , `meta_description` , `meta_keywords`) VALUES ('$title', '$content' , '$category' , '$slug' , '$cat_name' , '$url' , '$meta_description' , '$meta_keywords')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}

if (isset( $_POST['title_Blog'])){
  $title_Blog = $_POST["title_Blog"];
  $content_Blog = $_POST["content_Blog"];
  //TO INSERT ANY TYPE OF CONTENT LIKE SOURCE CODE
  $content_Blog = mysqli_real_escape_string($conn,$content_Blog);
  $slug_Blog = $_POST["slug_Blog"];
  $image_url_Blog = $_POST["image_url_Blog"];
  $meta_description_Blog = $_POST["meta_description_Blog"];
  $meta_description_Blog = mysqli_real_escape_string($conn,$meta_description_Blog);
  $meta_keywords_Blog = $_POST["meta_keywords_Blog"];
  $sql = "INSERT INTO `blogpost` (`title`, `content` ,  `slug` ,  `image_url` , `meta_description` , `meta_keywords`) VALUES ('$title_Blog', '$content_Blog' ,  '$slug_Blog' , '$image_url_Blog' , '$meta_description_Blog' , '$meta_keywords_Blog')";
  $result = mysqli_query($conn, $sql);
  if($result){ 
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Blogpost has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
}else{
  echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
} 
}
?>

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

  <title>iBlog Admin</title>

</head>



<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="/blog/admin.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <div class="form-group">
            <label for="title">Note Title</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
          </div>

          <div class="form-group">
            <label for="desc">Note Description</label>
            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer d-block mr-auto">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/blog/admin.php"><img src="/blog/img/logo.png" height="51px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" target="_blank" href="/blog/video.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your video has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your video has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  if($deleteb){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your blogpost has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your video/blogpost has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<div class="container my-4">
  <h1>iBlog Admin</h1>
  <hr>
  <h2>Add Video</h2>
  <form action="/blog/admin.php" method="POST">
    <div class="form-group">
      <label for="title">Title</label>
      <input required type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="title">Player Url</label>
      <input type="url" class="form-control" name="url" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="desc">Content</label>
      <script src="https://cdn.tiny.cloud/1/nx0uoh7aaxh6tv2scp44nyotk4lpnwkuqva8pkyhinqvqafu/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
      </head>


      <textarea id="txt" name="content" rows="25">


  </textarea>
      <script>
        tinymce.init({
          selector: '#txt',
          plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
        });
      </script>


    </div>

    <label for="category">Playlist</label>

    <select placeholder="Choose..." class="custom-select my-1 mr-sm-2" name="catid" id="inlineFormCustomSelectPref">

      <?php

        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($conn,$sql);
        while($row_category = mysqli_fetch_assoc($result)){
          $category_name = $row_category['category_name'];
          $cat_id = $row_category['category_id'];
          echo'  <option value="'.$cat_id.'">'.$category_name.'</option>';
        }

    ?>
    </select>
    <div class="form-group">
      <label for="title">Meta Description</label>
      <textarea  type="text" rows="5"  class="form-control p-0"  name="meta_description" aria-describedby="emailHelp"></textarea>    </div>
    
    <div class="form-group">
      <label for="title">Meta Keywords</label>
      <textarea  type="text" rows="3"  class="form-control p-0"  name="meta_keywords" aria-describedby="emailHelp"></textarea>    </div>

    
    <div class="form-group">
      <label for="title">Slug</label>
      <input required type="text" class="form-control" name="slug" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>

<hr>
<div class="container">

<h2>Add Blog</h2>
  <form action="/blog/admin.php" method="POST">
    <div class="form-group">
      <label for="title">Title</label>
      <input required type="text" class="form-control"  name="title_Blog" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="title">Image Url</label>
      <input type="url" class="form-control" name="image_url_Blog" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="desc">Content</label>
  
      </head>


      <textarea id="text" name="content_Blog" rows="25">


  </textarea>
      <script>
        tinymce.init({
          selector: '#text',
          plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
        });
      </script>


    </div>

    
    <div class="form-group">
      <label for="title">Meta Description</label>
      <textarea  type="text" rows="5"  class="form-control p-0"  name="meta_description_Blog" aria-describedby="emailHelp"></textarea>    </div>
    
    <div class="form-group">
      <label for="title">Meta Keywords</label>
      <textarea  type="text" rows="3"  class="form-control p-0"  name="meta_keywords_Blog" aria-describedby="emailHelp"></textarea>    </div>

    
    <div class="form-group">
      <label for="title">Slug</label>
      <input required type="text" class="form-control" name="slug_Blog" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
      </form>
     </div>
<hr>


<div class="container my-4">
    <h2>All Blogposts</h1>

      <table class="table" id="myTable1">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Title</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php




      $sql = "SELECT * FROM `blogpost`";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td>". $row['title'] . "</td>
        <td> <a class='edit btn btn-sm btn-primary' href='/blog/bedit.php?id=".$row['id']."'>Edit</a> <button  id='b".$row['id']."' class='deleteb btn btn-sm btn-danger'>Delete</button>  </td>
      </tr>";
    } 
  
      ?>



        </tbody>
      </table>
  </div>



<div class="container">
  <form action="/blog/admin.php" method="POST">
    <h2>Create Playlist</h2>

    <div class="form-group">
      <label for="">Category Name</label>

      <input type="text" required class="form-control" name="playlist">

    </div>

    <div class="form-group">
      <label for="">Category Description </label>

      <textarea type="text" style="height: 200px" class="form-control" name="description"></textarea>

    </div>

    <div class="form-group">

      <label for="">Category Url</label>
      <input type="url" required class="form-control" name="url">

    </div>
    <div class="form-group">

      <label for="">Image Url</label>
      <input type="url" required class="form-control" name="img">

    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Create Playlist</button>
  </form>
</div>



<hr>


<!-- Edit and Delete Playlist  -->

<h2>All Playlists</h1>

  <table class="table" id="myTable3">
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
              while($row = mysqli_fetch_assoc($result)){

                  $sno = $sno + 1;
                  echo "<tr>
                  <th scope='row'>". $sno . "</th>
                  <td>". $row['category_name'] . "</td>
                  <td>  <form style='margin:0' class='form-inline' action='/blog/admin.php' method='post' ><a class='edit btn btn-sm btn-primary' href='/blog/pledit.php?id=".$row['category_id']."'>Edit</a><input type='hidden' name='delete_playlist' value=".$row['category_id'].">";echo '<button type="button" onclick="popup'.$row['category_id'].'()"';echo "  class='btn ml-2 btn-danger btn-sm'>Delete</button><div  class='card mt-2 del' id='del".$row['category_id']."'>
                  <div class=' card-body'>
                    <h3>Are you sure you want to delete \"".$row['category_name']."\" playlist!</h3>
                    <button type='submit' style='float:right' class='delete_playlist  btn btn-sm mt-5 mb-3 mr-0 btn-danger'>Delete</button>

                    <button type='button'"; echo ' onclick="cancel'.$row['category_id'].'()"'; echo " style='float:left' class='delete_playlist  btn btn-sm mb-3 mt-5 btn-secondary'>Cancel</button>
                  </div>
                </div></form></div></td>
                  </tr>";
                  echo'<script>
                    function popup'.$row['category_id'].'() {
                      document.getElementById("del'.$row['category_id'].'").style.display = "block";
                    }
                    function cancel'.$row['category_id'].'() {
                      document.getElementById("del'.$row['category_id'].'").style.display = "none";
                    }
                  </script>';



              } 
  
        ?>



    </tbody>
  </table>
  </div>


  <hr />



  <!-- Fetch Playlist Videos -->

  <div class="container">
    <h2>Fetch Playlist Videos</h2>
    <form action="/blog/admin.php" method="get">
      <select class="custom-select my-1 mr-sm-2" name="catid" id="inlineFormCustomSelectPref">
        <option selected value="0">Select Playlist</option>
        <?php

        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($conn,$sql);
        while($row_category = mysqli_fetch_assoc($result)){
          $cat_name = $row_category['category_name'];
          $cat_id = $row_category['category_id'];
          echo'  <option value="'.$cat_id.'">'.$cat_name.'</option>';
        }

    ?>



      </select>
      <button type="submit" value="" class="btn btn-primary">Fetch Playlist</button>
    </form>

  </div>

  <hr>










  <div class="container my-4">
    <?php
  if(isset($_GET['catid'] )&& $_GET['catid']>0){
      $fetch_id = $_GET['catid'];

          $sql_fetch = "SELECT * FROM `category` where `category_id` = $fetch_id";
          $result_fetch = mysqli_query($conn, $sql_fetch);
          $row_fetch = mysqli_fetch_assoc($result_fetch);
          $heading_name = $row_fetch['category_name'];
          echo '<h2>Fetched Playlist: '.$heading_name.'</h2>';
          echo '<table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>';
          $sno = 0;
          $sql = "SELECT * FROM `playlist` where `category_id` = $fetch_id";
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['title'] . "</td>
            <td>". $row['category_name'] . "</td>
            <td> <a class='edit btn btn-sm btn-primary' href='/blog/edit.php?id=".$row['id']."'>Edit</a> <button class='delete btn btn-sm btn-danger' id=d".$row['id'].">Delete</button>  </td>
          </tr>";
        } 
      }
          ?>








    </tbody>
    </table>
  </div>

  <div class="container my-4">
    <h2>All Videos</h1>

      <table class="table" id="myTable5">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php




      $sql = "SELECT * FROM `playlist`";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td>". $row['title'] . "</td>
        <td>". $row['category_name'] . "</td>
        <td> <a class='edit btn btn-sm btn-primary' href='/blog/edit.php?id=".$row['id']."'>Edit</a> <button  id='d".$row['id']."' class='delete btn btn-sm btn-danger'>Delete</button>  </td>
      </tr>";
    } 
  
      ?>



        </tbody>
      </table>
  </div>

  <hr>

  <div class="container my-4">
    <h2>Contact Queries</h1>

      <table class="table" id="myTable4">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php




      $sql = "SELECT * FROM `contact`";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td>". $row['name'] . "</td>
        <td>". $row['date'] . "</td>
        <td> <a class='edit btn btn-sm btn-primary' href='/blog/c_admin.php?id=".$row['id']."'>View</a> </td>
      </tr>";
    } 
  
      ?>



        </tbody>
      </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    $(document).ready(function () {
      $('#myTable1').DataTable();

    });
  </script>
  <script>
    $(document).ready(function () {
      $('#myTable2').DataTable();

    });
  </script>
  <script>
    $(document).ready(function () {
      $('#myTable3').DataTable();

    });
  </script>
   <script>
    $(document).ready(function () {
      $('#myTable4').DataTable();

    });
  </script>
  <script>
    $(document).ready(function () {
      $('#myTable5').DataTable();

    });
  </script>
  <script>


    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this video!")) {
          console.log("yes");
          window.location = `/blog/admin.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
    
    deletesb = document.getElementsByClassName('deleteb');
    Array.from(deletesb).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this blogpost!")) {
          console.log("yes");
          window.location = `/blog/admin.php?deleteb=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })



  </script>
  </body>

</html>