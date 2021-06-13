<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>


<div class="mypanel">
<div class="mypanel-header">
<h3>Diploma  Question Papers</h3>
</div>
<div class="mypanel-body">
<?php 

	$search = "SELECT * FROM papers WHERE cid=1 ORDER BY semester ASC ";
	$run_search = mysqli_query($link,$search);
	if ($run_search) {
		echo "
		<table class='table'>
			<tr>
				<th>File</th><th>Subject</th><th>Year</th><th>Semester</th><th>Delete</th><th>Edit</th>
			</tr>
		";
		while ($row=mysqli_fetch_assoc($run_search)) {
			$crid = $row['pap_id'];
			$cors = $row['cid'];
			//$brn = $row['branch'];
			//$mo = $row['mode'];
			$subj = $row['subject_name'];
			$yar = $row['year'];
			$seme = $row['semester']; 
			$filn = $row['file_name'];
			echo "<tr><td>".$filn."</td><td>".$subj."</td><td>".$yar."</td><td><a href='files/papers/$filn'>".$seme."</a></td><td><a href='delete.php?del=$crid'>Delete</a></td><td><a href='admin.php?edit=$crid'>Edit</a></td></tr>";
		}
		echo "</table>";
	}
echo "<h1 style=' padding:10px; font-size:16px; text-align:center;'>".@$_GET['post']."</h1>";
?>
</div>

</div>

<?php } ?>