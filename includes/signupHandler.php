<?php
include 'config.php';

$uname = $_GET['uname'];
$email = $_GET['email'];
$pwd = md5($_GET['pwd']);
$cpwd = $_GET['upwd'];


$chk = mysqli_query($link, "SELECT * FROM od_users WHERE username='$uname' ");
$cnt = mysqli_num_rows($chk);
if ($cnt==1) {
	echo 2;
}
else{

	$ins = mysqli_query($link,"INSERT INTO od_users (uemail,username,upwd,upwd1,uaccopendate,ustatus,fcredits) VALUES ('$email','$uname','$pwd','$cpwd',current_date(),1,50)");
	if ($ins) {
		echo 1;
	}
	else{
		echo 0;
	}
}

?>