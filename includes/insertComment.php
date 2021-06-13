<?php
session_start();
include 'config.php';
extract($_GET);

if (isset($_SESSION['userId'])) {
	$ins = mysqli_query($link,"INSERT INTO comments (uid,fid,comment_text) VALUES ('$_SESSION[userId]','$fid','$txt')");
	echo "Thanks for your comment";
}
else{
	echo "Please <a href='#' data-toggle='modal' data-target='#login' style='margin: 2px 1px;' data-dismiss='modal'> Login First </a>";
}
?>