<?php
include 'includes/config.php';
echo $uid = $_GET['ud'];
echo $fid = $_GET['fld'];
echo $n = $_GET['st'];
if ($n==1) {
	$update = mysqli_query($link, "UPDATE files SET status=0 WHERE uid=$uid AND fileid=$fid ");
	header("location:acc.php?document");
}
else{
	$update = mysqli_query($link, "UPDATE files SET status=1 WHERE uid=$uid AND fileid=$fid ");
	header("location:acc.php?document");
}
?>