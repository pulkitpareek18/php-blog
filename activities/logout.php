<?php
session_start();

session_unset();
session_destroy();

header("location: login.php");
exit;

$gtag = "<!-- Google tag (gtag.js) -->
<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-NNVSZP1JM4\"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NNVSZP1JM4');
</script>";
?>