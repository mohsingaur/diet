<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>


<div class="header">
	<h1>Welcome to SAS-Education</h1>
	<div class="width-200">
		<form class="search" action="index.php?search" method="post" name="form" onclick="return validateForm(this.form)" >
			<input type="text" name="papername" placeholder="Search for papers" onkeyup="searchPap(this.value)">
			<input type="submit" name="search" value="Search" hidden>
		</form>
	</div>
	<!-- <div id="time"></div> -->
</div>

<?php } ?>
