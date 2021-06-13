<?php
include "includes/config.php";

extract($_GET);
echo "Id = $sid , Status = $st </br>";
if($st==1){
	$st=0;
}
elseif ($st==0) {
	$st=1;
}

$run = mysqli_query($link, "UPDATE subjects SET sub_status=$st WHERE sid=$sid ");
if ($run) {
	echo "Status has been changed to $st";
}

?>