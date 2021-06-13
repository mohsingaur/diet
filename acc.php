<?php
session_start();
if (!isset($_SESSION['userId'])) {
	header("location:index.php");
}
else{
	include 'includes/config.php';
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>My Account</title>

	<?php
	include 'includes/heads.php';
	?>

	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="javascript/functions.js"></script>

<!-- <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
-->
	<!-- <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
	<script>
 CKEDITOR.replace( 'articlecontent' );
</script>
-->


</head>
<body>

	<?php
	include 'includes/credits.php';
	include 'includes/userdetails.php';	
	include 'includes/editNameModal.php';
	include 'includes/editOcModal.php';
	include 'includes/editDobModal.php';
	include 'includes/editTelModal.php';
	include 'includes/editUsernameModal.php';
	include 'includes/editProfileModal.php';
	include 'includes/editAddressModal.php';
	include 'includes/editFileName.php';
	?>

	<div class="header">
		<div class="logo">
			<span> MyDocWorld </span>
		</div>
		
		<div class="navigation">
			<ul>
				<li> <a href="index.php"> <i class="fa fa-home"></i> Home</a> </li>
			</ul>
		</div>
	</div>

	<div class="main">
		
		<div class="side-bar">
			<ul>
				<li>
					<div> <img src="images/<?=$user['udp']?>"> </div>
					<div class="txt"> <font size="4" style="bold">Welcome</font> <?=$user['ufname']." ".$user['umname']." ".$user['ulname']; ?> <br>  <hr>
						Total Credits: <?=$total_credits?>
					</div>
				</li>
				<li>
					<i class="fa fa-home"></i> <a href="acc.php?dashboard">Dashboard</a> 
				</li>
				<li>
					<i class="fa fa-user"></i> <a href="acc.php?profile">My Profile</a> 
				</li>
				<li>
					<i class="fa fa-file"></i> <a href="acc.php?document">My Documents</a>  
				</li>
				<li>
					<i class="fa fa-clipboard"></i> <a href="acc.php?articles">My Articles</a> 
				</li>
				<li>
					<i class="fa fa-folder"></i> <a href="#services">Services</a> 
				</li>
				<li>
					<i class="fa fa-sign-out"></i> <a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>

		<div class="content-area">
			<?php
			if (isset($_GET['dashboard'])) {
				include 'includes/dashboard.php';
			}
			elseif (isset($_GET['profile'])) {
				include 'includes/profile.php';
			}
			elseif (isset($_GET['document'])) {
				include 'includes/document.php';
			}
			elseif (isset($_GET['articles'])) {
				include 'includes/articles.php';
			}
			elseif (isset($_GET['crrs'])) {
				include 'includes/passbook.php';
			}
			?>
		</div>

	</div>

</body>
</html>
