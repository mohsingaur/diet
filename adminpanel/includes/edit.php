<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
	$link = mysqli_connect("localhost","root","","stuff");
	$ed_id = $_GET['edit'];

	$search = "SELECT * FROM questionpaper WHERE papid='$ed_id' ";
	$run_search = mysqli_query($link,$search);
	if ($run_search) {
		while ($row=mysqli_fetch_assoc($run_search)) {
			$crid = $row['papid'];
			$cors = $row['course'];
			$mo = $row['mode'];
			$bnch = $row['branch'];
			$subj = $row['subject'];
			$yar = $row['year'];
			$seme = $row['semester']; 
			$filn = $row['file'];

}

?>



<div class="section">
<h3>Update Question Paper</h3>
<div class="width-400">
<div class="form">
<form method="post" enctype="multipart/form-data" action="admin.php?ed=<?php echo $ed_id; ?>" >
	
	<label for="course">Select Course</label>
	<select id="course" name="course" >
		<option value="<?php echo $cors; ?>"><?php echo $cors; ?></option>
	</select>
	
	<label for="mode">Select Mode<br></label>
	<select id="mode" name="mode">
		<option value="<?php echo $mo; ?>"><?php echo $mo; ?></option>
	</select>
	
	<label for="branch">Select Branch<br></label>
	<select id="branch" name="branch">
		<option value="<?php echo $bnch; ?>"><?php echo $bnch; ?></option>
	</select>
	
	<label for="sem">Select Semester<br></label>
	<select id="sem" name="sem">
		<option value="<?php echo $seme; ?>"><?php echo $seme; ?></option>
	</select>
	
	<label for="sub">Select Subject<br></label>
	<select id="sub" name="sub">
		<option value="<?php echo $subj; ?>"><?php echo $subj; ?></option>
	</select>
	
	<label for="year">Select Year<br></label>
	<select id="year" name="year">
		<option value="<?php echo $yar; ?>"><?php echo $yar; ?></option>
	</select>

	<label for="file">Select File</label>
	<input type="file" name="file" id="file" value="<?php echo $filn; ?>">
	<input class="submit" type="submit" name="update" value="Update Data">
	
</form>

</div>
</div>
</div>
<?php }

if (isset($_POST['update'])) {
	$crs = $_POST['course'];
	$mod = $_POST['mode'];
	$bnch = $_POST['branch'];
	$sub = $_POST['sub'];
	$sem = $_POST['sem'];
	$yer = $_POST['year'];
	$fnm = $_FILES['file']['name'];
	$fsz = $_FILES['file']['size'];
	$ftp = $_FILES['file']['type'];
	$ftm = $_FILES['file']['tmp_name'];

		move_uploaded_file($ftm, "files/papers/$fnm");
		$query = "UPDATE INTO questionpaper (course,subject,semester,year,file,branch,mode) VALUES ('$crs','$sub','$sem','$yer','$fnm','$bnch','$mod')";
		$run = mysqli_query($link,$query);
		if ($run) {
			echo "<script>alert('Data saved Successfully...')</script>";
		}
		else{
			echo "<script>alert('admin.php?sub=Oops! Something gonna be wrong please contact website developer...')</script>";
		}
	
}


} ?>