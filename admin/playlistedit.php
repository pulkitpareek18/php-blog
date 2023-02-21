<?php
include "../activities/variables.php";
include "../dbconnect.php";

    if (isset($_POST['id'])) {
        // Update the record
        $id = $_POST["id"];
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $img_url = $_POST["img"];
        $hidden = $_POST["hidden"];
        // Sql query to be executed
        $sql = "UPDATE `category` SET `category_name` = '$name' , `category_description` = '$desc' ,  `hidden` = '$hidden' , `image_url` = '$img_url' WHERE `category`.`category_id` = $id";
        $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($result);
        
        if ($result) {
            echo "Playlist Updated Successfully";
        } else {
            echo "We could not update the record successfully" . mysqli_error($conn);
        }
        $sql = "UPDATE `playlist` SET `category_name` = '$name' WHERE `playlist`.`category_id` = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Playlist Updated Successfully";
            header('Location: index.php');
            exit;
        } else {
            echo "We could not update the record successfully" . mysqli_error($conn);
        }
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

    <!-- Update Playlist -->
    <?php
    $row;
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $sql = "SELECT * FROM `category` where category_id = $category_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);


    ?>
            <div class="container">
                <form action="playlistedit.php" id="updatePlaylist" method="POST">
                    <h2>Create Playlist</h2>
                    <input type="hidden" value="<?php echo $row['category_id'] ?>" name="id">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" value="<?php echo $row['category_name'] ?>" required class="form-control" name="name">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hidden" type="hidden" value="0">
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
                        <label for="">Category Description </label>
                        <textarea type="text" style="height: 200px" class="form-control" name="desc"><?php echo $row['category_description'] ?></textarea>
                    </div>
                    <!-- <div class="form-group">
      <label for="">Category Url</label>
      <input type="url" required class="form-control" name="url">
    </div> -->
                    <div class="form-group">
                        <label for="">Image Url</label>
                        <input type="url" value="<?php echo $row['image_url'] ?>" class="form-control" name="img">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Playlist</button>
                </form>
            </div>


            <hr>

            </body>
    <?php
        }
    }
    ?>

</html>