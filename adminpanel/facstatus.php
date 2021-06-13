<?php
include "includes/config.php";

extract($_GET);
echo "Id = $fid , Status = $st </br>";
if($st==1){
	$st=0;
}
elseif ($st==0) {
	$st=1;
}

$run = mysqli_query($link, "UPDATE faculties SET fac_status=$st WHERE fid=$fid ");
if ($run) {
	echo "Status has been changed to $st";
}

?>