<!DOCTYPE HTML>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php

   
$update = false;

include "dbconnect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['id'])){
      // Update the record
        $id = $_POST["id"];
        $title = $_POST["titleEdit"];
        $content = $_POST["contentEdit"];
        $content = mysqli_real_escape_string($conn,$content);
        $slug = $_POST["slugEdit"];
        $meta_description = $_POST["descriptionEdit"];
        $meta_description = mysqli_real_escape_string($conn,$meta_description);
        $meta_keywords = $_POST["keywordsEdit"];
        $url = $_POST["urlEdit"];
       


     
       
        
      // Sql query to be executed
      $sql = "UPDATE `blogpost` SET `title` = '$title' , `slug` = '$slug' , `content` = '$content' ,  `image_url` = '$url' , `meta_description` = '$meta_description' , `meta_keywords` = '$meta_keywords' WHERE `blogpost`.`id` = $id";
      $result = mysqli_query($conn, $sql);
      if($result){
        $update = true;
    }

    else{
        echo "We could not update the record successfully".mysqli_error($conn);
    }

    }
    if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been updated successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
      header('Location: /blog/admin.php?update=true');
      }
     
     

 exit();    
 }

    include "dbconnect.php";
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['id']))
        $id = $_GET['id'];
        $sql = "SELECT * FROM `blogpost` where id = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
    }

    ?>
<div class="container">
  <div class="container my-4">
    <h1>iBlog Admin</h1>
    <hr>
    <h2>Add Blog</h2>
    <form action="/blog/bedit.php" method="POST">
      <input type="hidden" name="id" value="<?php  echo $id; ?>">
      <div class="form-group">
        <label for="title">Title</label>
        <input required type="text" value="<?php echo $row['title']; ?>" class="form-control" id="title"
          name="titleEdit" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="title">Image Url</label>
        <input type="url" value="<?php echo $row['image_url']; ?>" class="form-control" name="urlEdit"
          aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="desc">Content</label>
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/decoupled-document/ckeditor.js"></script>

        <script src="https://cdn.tiny.cloud/1/nx0uoh7aaxh6tv2scp44nyotk4lpnwkuqva8pkyhinqvqafu/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"></script>

        </head>

        <body>

          <textarea id="txt" name="contentEdit" rows="25">
<?php echo $row['content']; ?>

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

  </div>






  
  <div class="form-group">
    <label for="title">Meta Description</label>
    <textarea type="text" rows="5" class="form-control p-0" name="descriptionEdit" aria-describedby="emailHelp">

          <?php  echo $row['meta_description'];  ?>

        </textarea>
  </div>


<div class="form-group">

  <label for="title">Meta Keywords</label>
  <textarea type="text" rows="3" class="form-control p-0" name="keywordsEdit" aria-describedby="emailHelp">

            
  <?php  echo $row['meta_keywords'];  ?>

</textarea>

</div>


<div class="form-group">
  <label for="title">Slug</label>
  <input required type="text" value="<?php echo $row['slug'] ?>" class="form-control" name="slugEdit"
    aria-describedby="emailHelp">
</div>

<button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>