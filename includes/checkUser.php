<?php
include 'config.php';
$u = $_GET['uname'];

$chk = mysqli_query($link, "SELECT * FROM od_users WHERE username='$u' ");
$cnt = mysqli_num_rows($chk);
if ($cnt==1) {
	echo 0;
}
else{
	echo 1;
}
?>