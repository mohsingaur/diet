<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>



<div class="mypanel">
	<div class="mypanel-header">
		<b>Welcome to SAS Admin Panel</b>
	</div>
    <div class="mypanel-body">
	<p>This is the admin panel of sas education group. This is used for the purpose of uploading files and papers. This is for the good cause. we are providing an platform to the students so that they did not move so much for papers...</p>
    <p><strong>Laddoos</strong><br/>
	Laddos are symbol of joy and happiness. No celebration is complete without laddoos. At any celebration people ask for laddoos. So enjoyee the sweet taste of purity and happiness.</p>
	</div>
    
</div>

<?php } ?>