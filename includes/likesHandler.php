<?php
session_start();
include 'config.php';
if (!isset($_SESSION['userName'])) {
	echo "false";
}
else{
	$fid = $_GET['fid'];
	$check = mysqli_query($link, "SELECT * FROM upvote WHERE uid='$_SESSION[userId]' AND fid=$fid");
	$cnLikes = mysqli_num_rows($check); 
	if($cnLikes<1){
		mysqli_query($link,"INSERT INTO upvote (uid,fid,count) VALUES ('$_SESSION[userId]','$fid',1)");
		echo "like";	
	}
	else{
		echo "true";
	}
}
?>