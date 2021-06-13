<?php
	include "includes/config.php";
	//code for save course in the database
		$cname = $_GET['cname'];
		$fid = $_GET['facid'];
		$st = $_GET['st'];
		$lid = $_GET['lid'];
		$run = mysqli_query($link, "INSERT INTO course (c_name,fid,lid,status) VALUES ('$cname','$fid','$lid','$st')");
		if($run){
			echo "Data has been saved successfully";
		}
		else{
			echo "Sorry! Try again";
		}

	$getfid = @$_GET['fid'];
	$sel = mysqli_query($link, "SELECT * FROM course where fid=$getfid");
	echo "<label for='course'>Select Course<br></label><select onchange='subject(this.value)'>
	<option>Select Course / Branch</option>";
	while($row=mysqli_fetch_array($sel)){
		echo "<option value='$row[cid]'>".$row['c_name']."</option>";
	}
	echo "</select>";



?>
