<?php
session_start();
include 'includes/config.php';
@include 'includes/credits.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>About Me | Document Sharing </title>
  <?php
    include 'includes/heads.php';
  ?>

</head>

<body>

  <?php
    include 'includes/nav.php';
  ?>

  <div id="about">
  <?php
    include "includes/aboutUs.php";
  ?>
</div>
  
</body>
</html>