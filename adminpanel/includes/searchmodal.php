<?php

include "config.php";

$q = $_REQUEST['q'];
$len=strlen($q);

$search = "SELECT * FROM files f, subjects s WHERE f.subjectid=s.sid AND f.title LIKE'%$q%' ";
$run = mysqli_query($link,$search);
$count = mysqli_num_rows($run);
if($count==0){
	if (substr($q, 0,$len)){
	echo "<p style='padding:5px 15px;'><b>$q</b></p>
	<p style='padding:10px; '>No records found...</p>";
	}
}
else{
if (substr($q, 0,$len)) {
echo "
<p style='padding:5px 15px;'><b>$q</b></p>
<b align='center' style='padding:2px 10px;'>$count records found</b>";
echo "<table style='padding:5px;' class='table table-bordered'>
<tr><td>Name</td><td>Subject</td><td>Semester</td><td>year</td></tr>";
while ($row=mysqli_fetch_assoc($run)) {
	$cname = $row['title'];
	$url = $row['url'];
	$subject = $row['sname'];
	$semester = $row['semester'];
	$year = $row['year'];

	echo "<tr><td> <a href='$url'>$cname</a> </td><td> $subject </td><td> $semester </td><td> $year </td></tr>";

}
echo "</table>";
}
}


?>
