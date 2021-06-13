<?php
	session_start();
	include "includes/config.php";
	$user = $_GET['u'];
	$pwd = md5($_GET['p']);
	
	$sel = "SELECT admnid FROM administrator WHERE username='$user' AND password='$pwd' AND status=1 ";
	$run = mysqli_query($link,$sel);
	
	if (mysqli_num_rows($run) == 1) {
		$row = mysqli_fetch_array($run, MYSQLI_ASSOC);
		$_SESSION['adminid'] = $row['admnid'];
		echo 1;
	}
	else{
		echo 0;
	}

?>
