<?php
$uId = $_SESSION['userId'];
$total_credits = 0;
$tcr = 0;
$dcr = 0;

$welcomeCredit = mysqli_query($link,"SELECT fcredits FROM od_users WHERE uid='$uId' ");
while ($row=mysqli_fetch_array($welcomeCredit, MYSQLI_NUM)) {
	$cr = $row[0];
	$tcr += $cr;
}

$fileCredit = mysqli_query($link,"SELECT credit,status FROM files WHERE uid='$uId' ");
while ($row=mysqli_fetch_array($fileCredit, MYSQLI_NUM)) {
	$cr = $row[0];
	if ($row[1]==1) {
		$credit = $cr;
	}
	else{
		$credit = 0;
	} 
	$tcr += $credit;
}
//echo "<br>Total Cr: "; echo $tcr;

$downloadCredit = mysqli_query($link,"SELECT credit FROM downloadstatus WHERE uid='$uId' ");

while ($drow=mysqli_fetch_array($downloadCredit, MYSQLI_NUM)) {
	$dcr += $drow[0]; //Credit points for documents
}

//echo "<br>Total Dr: "; echo $dcr;

$total_credits = ($tcr - $dcr);
?>