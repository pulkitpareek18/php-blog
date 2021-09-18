<!DOCTYPE HTML>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php

   

include "dbconnect.php";


    include "dbconnect.php";
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['id']))
        $id = $_GET['id'];
        $sql = "SELECT * FROM `contact` where id = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
    }

    ?>


<div class="container">
  <div class="container my-4">
    <h1>iBlog Admin</h1>
    <hr>
    <h2>Contact Queries</h2>
  
      <input type="hidden" name="id" value="<?php  echo $id; ?>">
      <div class="form-group">
        <label for="title">Name</label>
        <input required type="text" value="<?php echo $row['name']; ?>" class="form-control" id="title"
          name="titleEdit" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="title">Phone No</label>
        <input type="text" value="<?php echo $row['phoneno']; ?>" class="form-control" name="urlEdit"
          aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="title">Email</label>
        <input type="text" value="<?php echo $row['email']; ?>" class="form-control" name="urlEdit"
          aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="title">Date</label>
        <input type="text" value="<?php echo $row['date']; ?>" class="form-control" name="urlEdit"
          aria-describedby="emailHelp">
      </div>
       
    <div class="form-group">
      <label for="title">Concern</label>
      <textarea  type="text" rows="5"  class="form-control p-0"  name="meta_description_Blog" aria-describedby="emailHelp"><?php echo $row['concern']; ?></textarea>    </div>
    
    <div class="form-group">
        
                


      </div></div>

  </div>






  
 




</div>






</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>