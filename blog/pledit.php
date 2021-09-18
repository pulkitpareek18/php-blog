<!DOCTYPE HTML>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/nx0uoh7aaxh6tv2scp44nyotk4lpnwkuqva8pkyhinqvqafu/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
 
    <?php

   
$update = false;

include "dbconnect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['id'])){
      // Update the record
        $id = $_POST["id"];
        $name = $_POST["nameEdit"];
        $desc = $_POST["descEdit"];
        $url = $_POST["urlEdit"];
        $img_url = $_POST["imgEdit"];
     


    
 
       
        
      // Sql query to be executed
      $sql = "UPDATE `category` SET `category_name` = '$name' , `category_description` = '$desc' ,  `category_url` = '$url' , `image_url` = '$img_url' WHERE `category`.`category_id` = $id";
      $result = mysqli_query($conn, $sql);
      // $row = mysqli_fetch_assoc($result);
      if($result){
        $update = true;
    }

    else{
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Error!</strong> We could not update the record successfully due to this error -->".mysqli_error($conn)."
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }

    }
    if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your playlist has been updated successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
      header('Location: /blog/admin.php?update_pl=true');
      }
     
     

 exit();    
 }

    include "dbconnect.php";
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['id']))
        $category_id = $_GET['id'];
        $sql = "SELECT * FROM `category` where category_id = $category_id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
    }

    ?>
  <div class="container">
  <div class="container my-4">
    <h2>iBlog Admin</h2>
    <form action="/blog/pledit.php" method="POST">
    <input type="hidden" name="id" value="<?php  echo $category_id; ?>">
      <div class="form-group">
        <label for="title">Category Name</label>
        <input required type="text" value="<?php echo $row['category_name']; ?>" class="form-control" id="title" name="nameEdit" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
      <label for="desc">Category Description</label>
      <textarea  type="text" rows="5"  class="form-control p-0"  name="descEdit" aria-describedby="emailHelp">
      <?php echo $row['category_description']; ?>
  </textarea></div>

      <div class="form-group">
        <label for="title">Category Url</label>
        <input required type="url" value="<?php echo $row['category_url']; ?>" class="form-control"  name="urlEdit" aria-describedby="emailHelp">
      </div> 
      <div class="form-group">
        <label for="title">Image Url</label>
        <input required type="url" value="<?php echo $row['image_url']; ?>" class="form-control"  name="imgEdit" aria-describedby="emailHelp">
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
   </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    </div>