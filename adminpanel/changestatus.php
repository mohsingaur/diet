<?php
include "includes/config.php";

extract($_GET);
echo "Id = $pid , Status = $st </br>";
if($st==1){
	$st=0;
}
elseif ($st==0) {
	$st=1;
}

$run = mysqli_query($link, "UPDATE files set approve=$st WHERE fileid=$pid ");
if ($run) {
	echo "Status has been changed to $st";
}

?>