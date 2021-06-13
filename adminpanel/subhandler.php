<option> <----------- Select Subject ------------> </option>
<?php
	include "includes/config.php";
	$getcid = $_GET['cid'];
	$selsub = mysqli_query($link, "SELECT * FROM subjects WHERE cid=$getcid");
	while($row=mysqli_fetch_assoc($selsub)){
		echo " <option value='$row[sid]'> $row[sname] </option> ";
	}
	echo "<option value='1000'>Others</option>";
?>