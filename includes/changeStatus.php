<?php
include 'config.php';
$uid = $_GET['uid'];
$fid = $_GET['fid'];
$n = $_GET['n'];

$update = mysqli_query($lnik, "UPDATE files SET status='$n' WHERE fileid='$fid' AND uid='$uid' ");
if ($update) {
	echo 1;
}
else{
	echo 0;
}
?>