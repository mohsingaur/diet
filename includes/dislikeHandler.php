<?php
session_start();
include 'config.php';
if (!isset($_SESSION['userName'])) {
	echo 0;
}
else{
	$fid = $_GET['fid'];
	$check = mysqli_query($link, "SELECT * FROM downvote WHERE uid='$_SESSION[userId]' AND fid=$fid");
	$cnLikes = mysqli_num_rows($check); 
	if($cnLikes<1){
		mysqli_query($link,"INSERT INTO downvote (uid,fid,dcount) VALUES ('$_SESSION[userId]','$fid',1)");
		echo 1;	
	}
	else{
		echo 2;
	}
}
?>