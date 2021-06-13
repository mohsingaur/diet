<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>

<div class="mypanel">
	<div class="mypanel-header">
		<b>Custom Search for Question Paper</b>
	</div>
    <div class="mypanel-body">
<?php

if (isset($_POST['search'])) {
	$crs = $_POST['next'];
	//$bnch = $_POST['branch'];
	//$sub = $_POST['sub'];
	//$sem = $_POST['sem'];
	//$yer = $_POST['year'];


$search = "SELECT * FROM papers WHERE cid='$crs'";
	$run_search = mysqli_query($link,$search);
	$records_found = mysqli_num_rows($run_search);
	if($records_found==0){
		echo "<h3 style='text-align:center;'>Sorry No data in the database...</h3>";
	}
	else{
		echo "
		<table>
			<tr>
				<caption>Search Result</caption>
				<th>Subject</th><th>Semester</th><th>Year</th><th>File Name</th><th>Delete</th><th>Edit</th>
			</tr>
		";
		while ($row=mysqli_fetch_assoc($run_search)) {
			$crid = $row['papid'];
			$cors = $row['course'];
			$mo = $row['mode'];
			$subj = $row['subject'];
			$yar = $row['year'];
			$seme = $row['semester']; 
			$filn = $row['file'];
			echo "<tr><td>".$subj."</td><td>".$seme."</td><td>".$yar."</td><td><a href='files/papers/$filn'>".$filn."</a></td><td><a href='delete.php?del=$crid'>Delete</a></td><td><a href='admin.php?edit=$crid'>Edit</a></td></tr>";
		}
		echo "</table>";
	}
//echo "<h1 style=' padding:10px; font-size:16px; text-align:center;'>".@$_GET['post']."</h1>";

}
 

 } ?>

<div class="width-400">
<form class="form" method="post">
<!--	<label for="course">Select Course</label>
	<select id="course" name="course" onchange="selBranch(this.id,'branch') ">
		<option value="">SELECT</option>
		<option value="BTech">BTech</option>
		<option value="Diploma">Diploma</option>
		<option value="BBA">BBA</option>
	</select>
	
	<label for="branch">Select Branch<br></label>
	<select id="branch" name="branch" onchange="selSem('course','sem')"></select>
	
	<label for="sem">Select Semester<br></label>
	<select id="sem" name="sem" onchange="selSub(this.id,'branch','course','sub')"></select>
	
	<label for="sub">Select Subject<br></label>
	<select id="sub" name="sub" onchange="selYear('sem','year')"></select>
	
	<label for="year">Select Year<br></label>
	<select id="year" name="year"></select>
-->

	<label for="sr">Search by<br></label>
	<select id="sr" name="searchby" onchange="searchBy(this.id,'next')">
		<option value="">Select</option>
		<option value="course">Course</option>
		<option value="branch">Branch</option>
		<option value="subject">Subject</option>
		<option value="semester">Semester</option>
		<option value="year">Year</option>
	</select>

	<label for="next">Select<br></label>
	<select id="next" name="next"></select>

	<input type="submit" name="search" value="Search">
	
</form>

</div>

</div>

</div>
