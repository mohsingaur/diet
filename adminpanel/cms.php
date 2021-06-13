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
		
<style>
/*
.tabbed > input { display:none; }

.tabbed > input:not(:checked) + section > div { display:none; }

.tabbed > section > h1 { float:left; }

.tabbed > section > div { float:right; width:100%;  }

.tabbed { float: left; width:100%; }

.tabbed > section > h1 > label{ cursor:pointer; -moz-user-select:none; -ms-user-select:none; -webkit-user-select:none; color:#000;}

.tabbed > section > div { box-sizing:border-box; padding:0.5em 0.75em; border:1px solid #ddd; border-radius:4px; box-shadow:0 0 0.5e rgba(0,0,0,0.0625); }

.tabbed > section > h1 {margin-bottom:0; box-sizing:border-box; margin:0; padding:0.5em 0.5em 0; overflow:hidden; font-size:1em; font-weight:normal; }

.tabbed > section > h1 > label { display:block; padding:4px 10px; border:1px solid #ddd; border-bottom:1px solid #33bbe5; border-top-right-radius:4px; border-top-left-radius:4px; box-shadow:0 0 0.5e rgba(0,0,0,0.0625);  }

.tabbed > input:fist-child + section > h1 { padding-left:1em; }

.tabbed > section > div {position:relative; z-index:1; }

.tabbed > input:checked + section > h1 {position:relative; z-index:2; }

.tabbed section > ul{ margin-left:30px;}

.tabbed table th{ color:#000; }
.tabbed select, input{color:#000;}
.tabbed a{ color:#fff;}
*/
</style>


<div class="mypanel">
	<div class="mypanel-header">
		<b>Content Management System</b>
	</div>
    <div class="mypanel-body">
	<div class="row">
<div class="tabbed">
	<input type="radio" id="tab1" name="tabbed" checked>
    <section>
    <h1><label for="tab1">Add New Papers</label></h1>
        <div>
        <?php
			include "includes/upload.php";
		?>
        </div>
   </section>
    
   <input type="radio" id="tab2" name="tabbed">
   <section>
   <h1> <label for="tab2">Add New Course</label></h1>
        <div>
        	<h4>Add New Course to the databse</h4>
            <div class="col-md-6">
            <form method="post" class="form" name="Form" enctype="multipart/form-data">
            <label for='cn'>Course Name</label>
			<input type="text" id='cn' name="cname" placeholder="Course Name">

			<label for='fn'>Faculty Name</label>
			<select name="fcid">
			<option> ------Select Faculty------- </option>
			<?php
			$selfac = mysqli_query($link,"SELECT * FROM faculties");
			while ($frow=mysqli_fetch_assoc($selfac)) {
				$fid = $frow['fid'];
				$fname = $frow['facultyname'];
				echo "<option value='$fid'>$fname</option>";
			}
			?>
				<option value="1000">Others</option>
			</select>

			<label for='lid'>Level</label>
			<select name="lid">
				<option> -----Select Level----- </option>
				<option value="1">Diploma</option>
				<option value="2">Under Graduate</option>
				<option value="3">Post Graduate</option>
				<option value="4">PHD</option>
				<option value="1000">Others</option>
			</select>

			<label for='im'>Image for subject</label>
			<input type="file" id='im' name="img">
				<br/>
         	<input type="radio" name="status" value='1'> Active &nbsp;&nbsp;
			<input type="radio" name="status" value='0'> Inactive

			<input type="submit" name="savecourse" value="Save Data">
			<!-- <button onclick="savecourse()">Save</button>-->
		</form>
		<?php
			if(isset($_POST['savecourse'])){
				$cnam = $_POST['cname'];
				$fidd = $_POST['fcid'];
				$stt = $_POST['status'];
				$lid = $_POST['lid'];
				$img_name = $_FILES['img']['name'];
				$img_size = $_FILES['img']['size'];
				$img_type = $_FILES['img']['type'];
				$tmp_name = $_FILES['img']['tmp_name'];
				move_uploaded_file($tmp_name, IMAGEURL.$img_name);
				$run = mysqli_query($link, "INSERT INTO course (c_name,crs_image,fid,lid,crs_status) VALUES ('$cnam','$img_name',$fidd','$lid','$stt')");
				if($run){
					echo "Data has been saved successfully";
				}
				else{
					echo "Sorry! Try again";
				}
			}
		?>

        </div>
        <div id="ajaxresult"></div>
        </div>
   </section>
    
    

    <input type="radio" id="tab3" name="tabbed">
    <section>
    <h1><label for="tab3">Add New subject</label></h1>
    	<div>
        <h4>Add New subjects to the databse</h4>
        <div class="col-md-6">
        <form method="post" role="form" class="form">
        	<label>Subject Name</label>
			<input type="text" name="sname" placeholder="Subject Name">

			<label>Select Course</label>
			<select name='cid'> 
				<option>Select Course</option>
            <?php
			$selcr = mysqli_query($link, "SELECT * FROM course");
			while($ft=mysqli_fetch_assoc($selcr)){
				echo "<option value='$ft[cid]'>$ft[c_name]</option>";
				}		
				echo "</select>";
			?>
				<input type="radio" name="status" value='1'> Active &nbsp;&nbsp;
				<input type="radio" name="status" value='0'> Inactive
				<input type="submit" name="savesubject" value="Save">
			</form>
            </div>
		</div>
		<?php
			if (isset($_POST['savesubject'])) {
				$subn = $_POST['sname'];
				$crsid = $_POST['cid'];
				$subst = $_POST['status'];
				$savecrs = mysqli_query($link, "INSERT INTO subjects (sname,cid,sub_status) VALUES ('$subn','$crsid','$subst') ");
				if ($savecrs) {
					echo "<script>alert('Data saved successfully...')</script>";
				}
				else{
					echo "<script>alert('Data saved successfully...')</script>";
				}
			}

		?>
   </section>



   <input type="radio" id="tab4" name="tabbed">
    <section>
    <h1><label for="tab4">Add New Faculty</label></h1>
    	<div>
        <h4>Add New Faculty to the databse</h4>
        <div class="col-md-6">
        <form method="post" role="form" class="form">
        	<label>Faculty Name</label>
			<input type="text" name="fname" placeholder="Faculty Name">

			<input type="radio" name="status" value='1'> Active &nbsp;&nbsp;
			<input type="radio" name="status" value='0'> Inactive
			<input type="submit" name="savefaculty" value="Save">
		</form>
        </div>
		</div>
		<?php
			if (isset($_POST['savefaculty'])) {
				$fna = $_POST['fname'];
				$st = $_POST['status'];
				$savefac = mysqli_query($link, "INSERT INTO faculties (facultyname,fac_status) VALUES ('$fna','$st') ");
				if ($savefac) {
					echo "<script>alert('Data saved successfully...')</script>";
				}
				else{
					echo "<script>alert('Data saved successfully...')</script>";
				}
			}

		?>
   </section>

   
			</div>
		</div>
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

<?php } ?>

