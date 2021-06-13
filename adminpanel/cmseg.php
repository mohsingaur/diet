
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

.tabbed table th{ color:#000; }*/
.tabbed select, input{color:#000;}
.tabbed a{ color:#fff;}
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
            <form class="form" name="Form">
			<input type="text" name="cname" placeholder="Course Name">
			<select name="fid">
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
			<select name="lid">
				<option> -----Select Level----- </option>
				<option value="1">Diploma</option>
				<option value="2">Under Graduate</option>
				<option value="3">Post Graduate</option>
				<option value="4">PHD</option>
				<option value="1000">Others</option>
			</select>
         	<input type="radio" name="status" value='1'> Active &nbsp;&nbsp;
			<input type="radio" name="status" value='0'> Inactive
			<button onclick="savecourse()">Save</button>
		</form>


		<script type="text/javascript">
		function savecourse(){
			var cname = document.Form.cname.value;
			var fid = document.Form.fid.value;
			var lid = document.Form.lid.value;
			var st = document.Form.status.value;
			if(cname == "" || fid == "" || lid == "" || st == "" ){
				alert("Enter Course name");
				return;
			}
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById('ajaxresult').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","handler.php?cname="+cname+"&facid="+fid+"&lid="+lid+"&st="+st,true);
			xmlhttp.send();
		}
		</script>
		<?php
		/*
			if(isset($_POST['savecourse'])){
				$cname = $_POST['cname'];
				$fid = $_POST['fid'];
				$st = $_POST['status'];
				$lid = $_POST['lid'];
				$run = mysqli_query($link, "INSERT INTO course (c_name,fid,lid,status) VALUES ('$cname','$fid','$lid','$st')");
				if($run){
					echo "Data has been saved successfully";
				}
				else{
					echo "Sorry! Try again";
				}
			}*/
		?>
        </div>
        <div id="ajaxresult">
        	<div id="load"></div>
        </div>
        </div>
   </section>
    
    <input type="radio" id="tab3" name="tabbed">
    <section>
    <h1><label for="tab3">Add New subject</label></h1>
    	<div>
        <h4>Add New subjects to the databse</h4>
        <div class="col-md-6">
        <form method="post" role="form" class="form">
					<input type="text" name="sname" placeholder="Subject Name" oninvalid="setCustomValidity('Enter Subject name')" required>
            <?php
			$selcr = mysqli_query($link, "SELECT * FROM course");
			echo "<select name='cid'> <option>Select Course</option>";
			while($ft=mysqli_fetch_assoc($selcr)){
				echo "<option value='$ft[cid]'>$ft[c_name]</option>";
				}		
				echo "</select>";
			?>
				<input type="radio" name="status" value='1'> Active &nbsp;&nbsp;
				<input type="radio" name="status" value='0'> Inactive
				<input type="submit" name="save" value="Save">
			</form>
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
				$st = $row['status'];
				if($st==1){
					$st = "<i class='fa fa-check' style='color:green'><i>";
					}
				else{
					$st = "<i class='fa fa-times' style='color:red'><i>";
					}
				echo "<tr><td>$row[cid]</td><td>$row[c_name]</td><td>$st</td></tr>";
				}		
				echo "</table>";
			?>
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
				$st = $row['status'];
				if($st==1){
					$st = "<i class='fa fa-check' style='color:green'><i>";
					}
				else{
					$st = "<i class='fa fa-times' style='color:red'><i>";
					}
				echo "<tr><td>$row[sid]</td><td>$row[sname]</td><td>$st</td></tr>";
				}		
				echo "</table>";
			?>
        </div>
   </section>
   
   <input type="radio" id="tab6" name="tabbed">
    <section>
    <h1><label for="tab6">All Posted Papers</label></h1>
        <div>
        <h4>List of All Papers</h4>
   			<?php 
				$search = mysqli_query($link, "SELECT * FROM papers p, subjects s WHERE p.sid=s.sid ORDER BY year ASC");
				$count = mysqli_num_rows($search);
				if($count==0){ echo "Sorry no data found"; }
				else{
				echo "
				<table class='table table-bordered'>
					<tr>
						<th>File ID</th><th>File Name</th><th>Subject</th><th>Semester</th><th>Year</th><th>Delete</th><th>Status</th>
					</tr>";
				while ($row=mysqli_fetch_assoc($search)) {
				$pid = $row['pap_id'];
				$cid = $row['cid'];
				$subj = $row['sname'];
				$yr = $row['year'];
				$sem = $row['semester']; 
				$filn = $row['file_name'];
				$st = $row['status'];
				if($st==1){
					$st = "<i class='fa fa-check' style='color:green'><i>";
					}
				else{
					$st = "<i class='fa fa-times' style='color:red'><i>";
					}
			echo "<tr><td>".$pid."</td><td><a href='files/papers/$filn'>".$filn."</a></td><td>".$subj."</td><td>".$sem."</td><td>".$yr."</td>
			<td><span title='Delete $filn' onClick='del($pid)'><i class='fa fa-trash'></i></span></td>
			<td>$st</td>
			</tr>";
		}
		echo "</table>";
				}
?>

<div id='del' style=' padding:10px; font-size:16px; text-align:center;'></div>
        </div>
   </section>
   
</div>
</div>
	</div>
</div>


<script>
			function del(pid){
				var cnf = confirm("Are you sure");
				if(cnf==true){
				document.getElementById("load").innerHTML = "Loading...";
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById('del').innerHTML = xmlhttp.responseText;
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


</script>