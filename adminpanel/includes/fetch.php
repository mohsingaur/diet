<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>


<div class="mypanel">
<div class="mypanel-header">
<h3>Uploaded Question Papers</h3>
</div>
<div class="mypanel-body">
<?php 

$link = mysqli_connect("localhost","root","","stuff");

	$search = "SELECT * FROM questionpaper ORDER BY year ASC ";
	$run_search = mysqli_query($link,$search);
	if ($run_search) {
		echo "
		<table>
			<tr>
				<th>Course</th><th>Branch</th><th>Mode</th><th>Subject</th><th>Semester</th><th>Year</th><th>File Name</th><th>Delete</th><th>Edit</th>
			</tr>
		";
		while ($row=mysqli_fetch_assoc($run_search)) {
			$crid = $row['papid'];
			$cors = $row['course'];
			$bn = $row['branch'];
			$mo = $row['mode'];
			$subj = $row['subject'];
			$yar = $row['year'];
			$seme = $row['semester']; 
			$filn = $row['file'];
			echo "<tr><td>".$cors."</td><td>".$bn."</td><td>".$mo."</td><td>".$subj."</td><td>".$seme."</td><td>".$yar."</td><td><a href='files/papers/$filn'>".$filn."</a></td><td><a href='delete.php?del=$crid'>Delete</a></td><td><a href='admin.php?edit=$crid'>Edit</a></td></tr>";
		}
		echo "</table>";
	}
echo "<h1 style=' padding:10px; font-size:16px; text-align:center;'>".@$_GET['post']."</h1>";
?>

</div>
</div>

<?php } ?>