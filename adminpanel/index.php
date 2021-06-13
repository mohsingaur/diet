<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['adminid'])) {
	header("location:login.php"); 
}
else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet/sas-style.css">
</head>
<body onload="clock()">
<!--  Header   -->
<div class="container-fluid">
	<div class="row header">
		<?php 
			include('includes/topbar.php'); 
		?>
	</div>

	<!--  content-bar   -->
	<div class="row">
		<div class="col-md-3 col-lg-3">
			<?php include('includes/navigation.php'); ?>
		</div>
		<div class="col-md-9 col-lg-9">
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
		</div>	
	</div>


<!--   Footer   -->
	<div class="row">
		<?php include('includes/footer.php'); ?>
	</div>
</div>

</body>
</html>
<script src="javascript/sel-course.js"></script>	

<?php } ?>

