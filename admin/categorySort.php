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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>    <title>iBlog-Admin</title>
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
</head>    
<?php include "loginCheck.php" ?>
<?php include "../includes/variables.php" ?>
<?php include "../dbconnect.php" ?>

<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<!-- Header -->
<nav class="position-static">
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
<!-- List Container -->
<div id="listParent" class="container">
<h1 class="font-weight-bold d-flex flex-column justify-content-center align-items-center">Sort Category</h1>
    <ul id="listData" class="p-5 ">
            <?php
                // Select all categories ordered by position
                $sql = "SELECT * FROM category ORDER BY position";
                $result = mysqli_query($conn, $sql);
                $index = 1;
                // Loop through each category
                while ($row = mysqli_fetch_assoc($result)) {

                    echo'<li id="'.$row['category_id'].'" class="btn btn-primary  p-1 d-flex justify-content-center" style="margin: 10px 0;">
                            <div class="media align-items-center">
                                <h5 class="mt-0 mb-1">'.$row['category_name'].'</h5>
                                </div>
                        </li>';
                
                    }
            ?>
    </ul>
</div>

<script>
    $(function() {
        $("#listData").sortable({
            // Only allow vertical sorting
            axis: "y", // Sort vertically
            opacity: 0.7, // Set opacity of dragged item
            cursor: "move", // Set cursor style for dragged item
            containment: "#listParent", // Limit sorting to within the container
            scroll: true,
            scrollSensitivity: 81,
            scrollSpeed: 40,
            delay: 0,
            distance: 0,
            animate: 150,
            forceFallback: true,
            scrollTarget: "#listParent",
            update: function(event, ui) {
                // Get the sorted item IDs
                var sortedIds = $(this).sortable("toArray");
                console.log(sortedIds);
                // Execute your function here
                $.post("backend.php", {
                    sort_category_data: sortedIds
                }, function(data) {
                    console.log(data);
                });
            }
        });
        $("#listData").disableSelection();
    });
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
   

</html>


