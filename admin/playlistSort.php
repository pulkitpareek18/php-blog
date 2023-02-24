<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery.js"></script>
    <script src="admin.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>iBlog-Admin</title>

    <?php include "../includes/variables.php" ?>
    <?php include "loginCheck.php" ?>
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

        a {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <nav style="width: 100%;">
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
    <div class="allData mt-3 d-flex flex-column justify-content-center align-items-center mt-0">
        <h1 class="font-weight-bold mt-5">Sort Playlist</h1>
        <div class=" container d-flex m-2 align-items-center justify-content-center flex-nowrap flex-column">
            <!-- Modal -->
            <div class="card w-50">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Playlist</h5>
                </div>
                <div class="modal-body">
                    <select placeholder="Choose..." class="custom-select my-1 mr-sm-2" name="catid" id="modalSelector">
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
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="listPlaylist()" class="btn btn-primary">List Playlist</button>
                </div>
            </div>


            <!-- List Container -->
            <div id="listParent">
                <ul id="listData" style="height: 75vh; overflow: auto;" class="p-5"></ul>
            </div>

            <input id="category_id" type="hidden">

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
                            var categoryId = $("#category_id").val(); // Hidden input tag passed via backend
                            $.post("backend.php", {
                                sort_playlist: categoryId,
                                sort_data: sortedIds
                            }, function(data) {
                                console.log(data);
                            });
                        }
                    });
                    $("#listData").disableSelection();
                });
            </script>

        </div>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html>