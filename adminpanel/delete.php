<?php
include "includes/config.php";
$pid = $_GET['pid'];
$delete = "DELETE FROM files WHERE fileid=$pid ";
if (mysqli_query($link,$delete)) {
	echo 1;
}
else{
	echo 0;
}

?>