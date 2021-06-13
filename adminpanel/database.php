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

<div class="container-fluid">
	<!--  Header starts   -->
    <div class="row header">
		<?php 
			include('includes/topbar.php'); 
		?>
	</div>
	<!--  Header ends  -->
    
	<!--  content-bar starts here   -->
	<div class="row">
		<div class="col-md-3 col-lg-3">
			<?php include('includes/navigation.php'); ?>
		</div>
		
        <div class="col-md-9 col-lg-9">
        	
            <div class="mypanel">
				<div class="mypanel-header">
					<b>Database Management System</b>
				</div>
    			<div class="mypanel-body">
					<div class="row">
						<div class="tabbed">
            	
                			<input type="radio" id="tab6" name="tabbed" checked>
    							<section>
    								<h1><label for="tab6">All Posted Papers</label></h1>
        							<div>
        								<h4>List of All Papers</h4>
   										<?php 
											$search = mysqli_query($link, "SELECT s.sname,c.c_name, f.fileid, u.username, d.categoryname, f.*, c.* FROM files f LEFT JOIN course c ON f.courseid=c.cid LEFT JOIN subjects s ON s.sid=f.subjectid LEFT JOIN od_users u ON f.uid=u.uid LEFT JOIN od_category d ON d.catid=f.ctid ");
											$count = mysqli_num_rows($search);
											if($count==0){ echo "Sorry no data found"; }
											else{
												echo "
														<table class='table table-bordered'>
														<tr>
															<th>File ID</th><th>File Name</th><th>Category</th><th>Uploaded By</th><th>Subject</th><th>Course Name</th><th>Semester</th><th>Year</th><th>Delete / Edit</th><th>Approved</th>
														</tr>";
												while ($row=mysqli_fetch_array($search)) {
													$pid = $row[2];
													$username = $row[3];
													$cr = $row['credit'];
													$cnm = $row[1];
													$subj = $row[0];
													$yr = $row['year'];
													$sem = $row['semester']; 
													$filn = $row['title'];
													$filurl = "../documents/".$row['filetmpname'];
													$st = $row['approve'];
													if($st==1){
														$state = "<i class='fa fa-check-circle-o fa-2x' style='color:green'><i>";
													}
													else{
														$state = "<i class='fa fa-times-circle-o fa-2x' style='color:red;'><i>";
													}
													if ($username=="") {
														$username = "Admin";
													}
													echo "<tr>
														<td>$pid</td>
														<td> <a href='$filurl'>$filn</a> </td>
														<td>$row[4]</td>
														<td>$username</td>
														<td>$subj</td>
														<td>$cnm</td>
														<td>$sem</td>
														<td>$yr</td>
														<td style='text-align:center;'><span title='Delete $filn' onclick='del($pid)'><i class='fa fa-trash'></i></span> / <span title='Edit $filn' onclick='edit($pid)'><i class='fa fa-pencil'></i></span></td>
														<td style='text-align:center;'><span onclick='changePaperStatus($pid,$st)'>$state</span></td>
														</tr>";
												}
										echo "</table>";
										}
										?>
										<div id='del_output' style=' padding:10px; font-size:16px; text-align:center;'>
										<?php 
										echo @$_GET['del']; ?></div>
										<div id="ajax_pap" class="alert alert-danger">
										<div id="load"></div>
										</div>
        							</div>
   								</section>
   
  	 						<input type="radio" id="tab7" name="tabbed">
    <section>
    <h1><label for="tab7">Faculty List</label></h1>
        <div>
        <h4>List of faculty</h4>
           <?php
			$run = mysqli_query($link, "SELECT * FROM faculties");
			echo "<table class='table table-bordered'>
			<tr>
				<th>Faculty Id</th><th>Name</th><th>Status</th>
			<tr>";
			while($row=mysqli_fetch_assoc($run)){
				$fid = $row['fid'];
				$fst = $row['fac_status'];
				if($fst==1){
					$f_st = "<i id='fg' class='fa fa-check-circle-o fa-2x' style='color:green;'></i>";
					}
				else if($fst==0){
					$f_st = "<i id='fr' class='fa fa-times-circle-o fa-2x' style='color:red'></i>";
					}
				echo "<tr><td> $fid </td> 
				<td>$row[facultyname]</td> 
				<td style='text-align:center;'> <span onclick='changeFacultyStatus($fid,$fst)'> $f_st </span> </td>
				</tr>";
				}		
				echo "</table>";
			?>
			<div id="ajax_fac" class="alert alert-danger">
				<div id="load"></div>
			</div>
        </div>
   </section>
   	
   							<input type="radio" id="tab4" name="tabbed">
    <section>
    <h1><label for="tab4">Course List</label></h1>
        <div>
        <h4>List of Course</h4>
           <?php
			$run = mysqli_query($link, "SELECT * FROM course");
			echo "<table class='table table-bordered'>
			<tr>
				<th>Course Id</th><th>Name</th><th>Status</th>
			<tr>";
			while($row=mysqli_fetch_assoc($run)){
				$cid = $row['cid'];
				$st = $row['crs_status'];
				if($st==1){
					$c_st = "<i class='fa fa-check-circle-o fa-2x' style='color:green'></i>";
					}
				else if($st==0){
					$c_st = "<i class='fa fa-times-circle-o fa-2x' style='color:red'></i>";
					}
				echo "<tr><td> $cid </td> 
				<td>$row[c_name]</td> 
				<td style='text-align:center;'> <span onclick='changeCourseStatus($cid,$st)'> $c_st </span> </td>
				</tr>";
				}		
				echo "</table>";
			?>
			<div id="ajax_crs" class="alert alert-danger">
				<div id="load"></div>
			</div>
        </div>
   </section>
   	
   							<input type="radio" id="tab5" name="tabbed">
    <section>
    <h1><label for="tab5">Subjects List</label></h1>
        <div>
        <h4>List of Subjects</h4>
           <?php
			$run = mysqli_query($link, "SELECT * FROM subjects");
			echo "<table class='table table-bordered'>
			<tr>
				<th>Subject Id</th><th>Name</th><th>Status</th>
			<tr>";
			while($row=mysqli_fetch_assoc($run)){
				$sid = $row['sid'];
				$subst = $row['sub_status'];
				if($subst==1){
					$substate = "<i class='fa fa-check-circle-o fa-2x' style='color:green'></i>";
					}
				else{
					$substate = "<i class='fa fa-times-circle-o fa-2x' style='color:red'></i>";
					}
				echo "<tr><td>$sid</td><td>$row[sname]</td>
				<td align='center'> <span onclick='changeSubjectStatus($sid,$subst)'> $substate </span> </td></tr>";
				}		
				echo "</table>";
			?>
			<div id="ajax_sub" class="alert alert-danger">
				<div id="load"></div>
			</div>
        </div>
   </section>
   						</div>
					</div>
				</div>
			</div> <!--  my panel ends here   -->
		
        </div> <!--  col-lg-9 ends here   -->
        
	</div> <!--  content-bar ends here   -->

	<!--   Footer starts here   -->
	<div class="row">
		<?php include('includes/footer.php'); ?>
	</div>
    
</div>

</body>
</html>

<?php } ?>



<script>
function del(pid){
	var div = document.getElementById('del_output');
	var cnf = confirm("Are you sure");
	if(cnf==true){
	xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			var reply = xmlhttp.responseText;
			}
			if (reply==1) {
				div.innerHTML = "Deleted Successfully.";
			}
			else{
				div.innerHTML = "Something went wrong. Please contact website administrator";	
			}
		}	
		xmlhttp.open("GET","delete.php?pid="+pid,true);
		xmlhttp.send(null);
	}
	else{
		document.getElementById('del').innerHTML = "Paper Not delete."	;
		}
	function ref(){
		document.getElementById('del').innerHTML = '';
		}
	setTimeout(ref,2000);
}


function changePaperStatus(id,st){
	document.getElementById("ajax_pap").style.display = "block";
	document.getElementById("load").innerHTML = "<img src='../images/progress.gif' height='30' width='40'>";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("ajax_pap").innerHTML = xmlhttp.responseText;
		}
	}	
	xmlhttp.open("GET","changestatus.php?pid="+id+"&st="+st,true);
	xmlhttp.send(null);
	setTimeout(function(){closeinfo()},3000);
	function closeinfo(){
		document.getElementById("ajax_pap").style.display = "none";
	}
}

function changeCourseStatus(id,st){
	document.getElementById("ajax_crs").style.display = "block";
	document.getElementById("load").innerHTML = "<img src='../images/progress.gif' height='30' width='40'>";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById('ajax_crs').innerHTML = xmlhttp.responseText;
		}
	}	
	xmlhttp.open("GET","crstatus.php?cid="+id+"&st="+st,true);
	xmlhttp.send(null);
	setTimeout(function(){closeinfo()},3000);
	function closeinfo(){
		document.getElementById("ajax_crs").style.display = "none";
	}
}

function changeSubjectStatus(id,st){
	document.getElementById("ajax_sub").style.display = "block";
	document.getElementById("load").innerHTML = "<img src='../images/progress.gif' height='30' width='40'>";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById('ajax_sub').innerHTML = xmlhttp.responseText;
		}
	}	
	xmlhttp.open("GET","substatus.php?sid="+id+"&st="+st,true);
	xmlhttp.send(null);
	setTimeout(function(){closeinfo()},3000);
	function closeinfo(){
		document.getElementById("ajax_sub").style.display = "none";
	}
}

function changeFacultyStatus(id,st){
	document.getElementById("ajax_fac").style.display = "block";
	document.getElementById("load").innerHTML = "<img src='../images/progress.gif' height='30' width='40'>";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById('ajax_fac').innerHTML = xmlhttp.responseText;
		}
	}	
	xmlhttp.open("GET","facstatus.php?fid="+id+"&st="+st,true);
	xmlhttp.send(null);
	setTimeout(function(){closeinfo()},3000);
	function closeinfo(){
		document.getElementById("ajax_fac").style.display = "none";
	}
}


</script>