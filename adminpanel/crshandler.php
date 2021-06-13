<option> <----------- Select Course ------------> </option>
<?php
	include "includes/config.php";
	$getfid = $_GET['fid'];
	$selcrs = mysqli_query($link, "SELECT * FROM course WHERE fid=$getfid");
	while($row=mysqli_fetch_array($selcrs)){
		echo "<option value='$row[cid]'> $row[c_name] </option>";
	}
	
	
?>
