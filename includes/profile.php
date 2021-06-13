<?php

echo @$_GET['ch'];

?>

<h2>My Profile</h2>
<p>You can change your account settings here</p>

<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<b>Personal Info</b>
		</div>
		<div class="panel-body">

			<div class="profile">
				<div class="label-box">
					<label>Name</label>
					<p>
						<?php echo $user['ufname']." ".$user['umname']." ".$user['ulname'] ?> <a href='#' data-toggle='modal' data-target='#editName'><i class='fa fa-pencil fltrt'></i> </a>
					</p>
				</div>
				<div class="label-box">
					<label>Username</label>
					<p>
						<?=$user['username'] ?>
					</p>
				</div>
				<div class="label-box">
					<label>Email</label>
					<p>
						<?=$user['uemail'] ?> </i>
					</p>
				</div>
				<div class="label-box">
					<label>Mobile No</label>
					<p>
						<?=$user['umobile']?> <a href='#' data-toggle='modal' data-target='#editTel'><i class="fa fa-pencil fltrt"></i></a>
					</p>
				</div>
				<div class="label-box">
					<label>Address</label>
					<p>
						<?=$user['uaddress'] ?> <a href='#' data-toggle='modal' data-target='#editAddress'><i class="fa fa-pencil fltrt"></i> </a>
					</p>
				</div>
				<div class="label-box">
					<label>DOB</label>
					<p>
						<?=$user['udob'] ?> <a href='#' data-toggle='modal' data-target='#editDob'> <i class="fa fa-pencil fltrt"></i> </a>
					</p>
				</div>
				<div class="label-box">
					<label>Occupation</label> 
					<p>
						<?=$user['uoccupation']?> <a href='#' data-toggle='modal' data-target='#editOc'><i class='fa fa-pencil fltrt'></i></a>
					</p>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="col-md-4">
	<div class="panel panel-info">
		<div class="panel-heading">
			<?=$user['ufname']." ".$user['ulname']?>
		</div>
		<div class="panel-body">
			<div class="img">
				<img height="175" width="175" src="images/<?=$user['udp']?>" onclick="popup('image-modal',this.src)" >
			</div>
			<br>
			<hr>
			<div class="txt-center">
				<a href='#' data-toggle='modal' data-target='#editPic'><i class='fa fa-camera fa-2x'></i> </a>
			</div>
			<div class="cover" id="image-modal">
				<div class="end">&times;</div>
				<div class="popup-content">
					<img id="src" src="">
				</div>
			</div>
		</div>
	</div>
