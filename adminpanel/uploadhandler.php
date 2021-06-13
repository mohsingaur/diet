<?php
if (isset($_POST['submit'])) {
	$fid = $_POST['faculty'];
	$cid = $_POST['course'];
	$sid = $_POST['subject'];
	$sem = $_POST['semester'];
	$yr = $_POST['year'];
	$st = $_POST['status'];
	$fln = $_FILES['paper']['name'];
	$fls = $_FILES['paper']['size'];
	$flt = $_FILES['paper']['type'];
	$fltmp = $_FILES['paper']['tmp_name'];
	
		move_uploaded_file($fltmp,"files/papers/".$fln);
		$query = "INSERT INTO papers (file_name,year,semester,fid,cid,sid,status) VALUES ('$fln','$yr','$sem','$fid','$cid','$sid','$st')";
		$run = mysqli_query($link,$query);
		if ($run) {
			echo "<script>alert('Data saved Successfully...')</script>";
		}
		else{
			echo "<script>alert('adminpanel.php?sub=Oops! Something gonna be wrong please contact website developer...')</script>";
		}
	
}
