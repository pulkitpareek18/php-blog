<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Hi</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

</head>

<body>
    <div class="container mt-3">
        <?php
        include "dbconnect.php";
        $sql = "SELECT * FROM `video_comments` ORDER BY `video_comments`.`comment_id` DESC";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {

            echo '<table id="comment_table" class="display">
<thead>
            <tr>
              <th>Username</th>
              <th>Comment Content</th>
              <th>Comment Post Title</th>
            </tr>
            </thead>
            <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                $comment_post_id = $row['comment_post_id'];
                $username = $row['username'];
                $comment_content = $row['comment_content'];
                $sql_title = "SELECT * FROM `playlist` where `id`=$comment_post_id";
                $row_title = mysqli_fetch_assoc( mysqli_query($conn, $sql_title) );
                $title= $row_title['title'];
                echo '<tr>
              <td>' . $username . '</td>
              <td>' . $comment_content . '</td>
              <td>' . $title . '</td>
            </tr>';
            }
            echo "</tbody></table>";
        }
        ?></div>
</body>

<script>
    $(document).ready(function() {
        $('#comment_table').DataTable();
    });
</script>

<html>