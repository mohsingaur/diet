<?php

include "config.php";

$q = $_REQUEST['q'];
$len=strlen($q);

$search = "SELECT * FROM files f, subjects s WHERE f.subjectid=s.sid AND f.title LIKE'%$q%' ";
$run = mysqli_query($link,$search);
$count = mysqli_num_rows($run);
if($count==0){
	if (substr($q, 0,$len)){
	echo "<p style='padding:2px 15px;'><b>$q</b></p>
	<p style='padding:10px 10px; '>No records found...</p>";
	}
}
else{
if (substr($q, 0,$len)) {
echo "
<p style='padding:2px 15px;'><b>$q</b></p>
<b align='center' style='padding:2px 10px;'>$count records found</b>";

while ($row=mysqli_fetch_assoc($run)) {
	echo "<span style='border-top:1px solid #ddd; display:block; padding:2px 10px;'>
			<a href='view.php?fn=$row[filetmpname]'>$row[title]</a> 
		</span>";
		}
	}
}


?>
