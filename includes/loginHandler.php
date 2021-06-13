<?php
session_start();
include 'config.php';
extract($_GET);
  $user = mysqli_query($link, "SELECT * FROM od_users WHERE username='$uname' AND upwd1='$pwd' ");
  $cnt=mysqli_num_rows($user);
  if ($cnt==1) {
  $row=mysqli_fetch_assoc($user);
    $_SESSION['userId'] = $row['uid'];
    $_SESSION['userName'] = $row['username'];
    echo 1;
  }
  else
    echo 0;

?>

