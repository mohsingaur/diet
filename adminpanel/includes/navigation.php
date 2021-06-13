<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>
	<div class="mynav">
		<ul>
			
			<a href="index.php"><li>Home</li></a>
            <a href="cms.php"><li>Content Management</li></a>
            <a href="database.php"><li>File Management</li></a>
			<a href="logout.php"><li>Logout</li></a>
		</ul>
	</div>


<?php }  ?>