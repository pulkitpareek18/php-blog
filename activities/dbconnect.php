<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "blog";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
      die('Could not Connect MySql Server:');
    }

?>

<?php

// $servername='sql108.epizy.com';
// $username='epiz_29316568';
// $password='mfaTiKE8bVK';
// $dbname = 'epiz_29316568_iblog';
// $conn=mysqli_connect($servername,$username,$password,$dbname);
//   if(!$conn){
//       die('Could not Connect MySql Server:');
//     }

?>