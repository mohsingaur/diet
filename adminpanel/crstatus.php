<?php
include "includes/config.php";

extract($_GET);
echo "Id = $cid , Status = $st </br>";
if($st==1){
	$st=0;
}
elseif ($st==0) {
	$st=1;
}

$run = mysqli_query($link, "UPDATE course SET crs_status=$st WHERE cid=$cid ");
if ($run) {
	echo "Status has been changed to $st";
}

?>