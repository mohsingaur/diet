<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>



<div class="header">
	<div>SAS Private limited&trade;</div>
	<div>Designer and Developer : <strong>Mohsin Gaur</strong></div>
	
	<div>&copy; 2016 : All Rights Reserved.</div>
</div>

<?php } ?>