<?php
include 'config.php';
$user = $_GET['u'];
$sel = mysqli_query($link, "SELECT * FROM administrator WHERE username='$user' ");
  if (mysqli_num_rows($sel)>0) {
  	echo 1;
  }
  else{
  	echo 0;
  }
?>