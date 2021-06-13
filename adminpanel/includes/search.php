<?php

include 'includes/config.php';



if (isset($_POST['search'])) {
	$sp = $_POST['papername'];
?>
<div class="section">

<?php
$search = "SELECT * FROM questionpaper WHERE course='$sp' OR branch='$sp' OR subject='$sp' OR semester='$sp' OR year='$sp'";
$run = mysqli_query($link,$search);
$count = mysqli_num_rows($run);
if($count==0){
	echo "Oops! No record found in the database... Please type a correct name or go to advance search";
}
else{
echo "<h2 align='center'>$count records found</h2>";
echo "<table><tr><th>Course</th><th>Branch</th><th>Subject</th><th>Semester</th><th>year</th><th>Delete</th><th>Edit</th></tr>";
while ($row=mysqli_fetch_assoc($run)) {
	$crid = $row['papid'];
	$cname = $row['course'];
	$branch = $row['branch'];
	$subject = $row['subject'];
	$semester = $row['semester'];
	$year = $row['year'];

	echo "<tr><td> $cname </td><td> $branch </td><td> $subject </td><td> $semester </td><td> $year </td><td> <a href='delete.php?del=$crid'>Delete</a> </td><td><a href='admin.php?edit=$crid'>Edit</a> </td></tr>";

}
echo "</table>";
}
}
?>
</div>