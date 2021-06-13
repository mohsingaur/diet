<script>
	function selCrs(id){
		document.getElementById("course").style.display = "block";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("course").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","crshandler.php?fid="+id,true);
		xmlhttp.send(null);
	}

	
	function subj(cid){
		document.getElementById("sub").style.display = "block";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("subject").innerHTML = xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","subhandler.php?cid="+cid,true);
		xmlhttp.send(null);
	}
</script>


<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
	$fcategory = mysqli_query($link,"SELECT * FROM od_category");
	
?>

		<h4>Upload New Question Paper</h4>
     	<div class="row">
        	<div class="col-md-6">
     			<form class="form" method="post" enctype="multipart/form-data" role="form">
					<label for="fn">File Name</label>
					<input type="text" name="filename" id="fn" placeholder="Enter File Name / Keyword" required;>

					<label for="desc">Description</label>
					<textarea name="desc" id="desc" placeholder="Enter Description" required></textarea>

					<label for='cat'>Category</label>
					<select name='filecat'>
						<option> <----------- Select Category ------------> </option>
						<?php 
							while($catrow=mysqli_fetch_assoc($fcategory)){
							$catid = $catrow['catid'];
							$catname = $catrow['categoryname'];
							echo "<option value='$catid'>$catname</option>";
							}
						?>
					</select>


					<label for="faculty">Select Faculty</label>
					<select id="faculty" name="faculty" onChange="selCrs(this.value)">
                    	<option> <----------- Select Faculty ------------> </option>
    					<?php
							 $sql = mysqli_query($link, "SELECT * FROM faculties");
							 while($row=mysqli_fetch_array($sql)){
								 echo "<option value='$row[fid]'>$row[facultyname]</option>";
								 }
						?>
        			</select>

                    <select id="course" name="course" style="display: none;" onChange="subj(this.value)">
					
					</select>
                    
                    <div id="sub" style="display:none">
                    	<select id="subject" name="subject">
                    
                    	</select>

                        <select name="semester">
                        	<option> <----------- Select Semester ------------> </option>
                        	<option value="1"> I<sup>st</sup> Semester </option>
                            <option value="2"> II<sup>nd</sup> Semester</option>
                            <option value="3"> III<sup>rd</sup> Semester</option>
                            <option value="4"> IV<sup>th</sup> Semester</option>
                            <option value="5"> V<sup>th</sup> Semester</option>
                            <option value="6"> VI<sup>th</sup> Semester</option>
                        </select>
                        
                        <select name="year">
                        	<option> <----------- Select Year ------------> </option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>

			<label for="file">Select File</label>
			<input type="file" name="paper" id="file"><br/>

			<input type="radio" name="status" value="1"> Active &nbsp; &nbsp;
			<input type="radio" name="status" value="0"> Inactive<br/>

			<input class="submit" type="submit" name="submit" value="Save Data">
		</form>
        </div>
       </div>
     

<?php

if (isset($_POST['submit'])) {
	$fn = $_POST['filename'];
	$fid = $_POST['faculty'];
	$cid = $_POST['course'];
	$sid = $_POST['subject'];
	$sem = $_POST['semester'];
	$yr = $_POST['year'];
	$desc = $_POST['desc'];
	$filecat = $_POST['filecat'];
	$sta = $_POST['status'];
	$fln = $_FILES['paper']['name'];
	$fls = $_FILES['paper']['size'];
	//$flt = $_FILES['paper']['type'];
	$fltmp = $_FILES['paper']['tmp_name'];
	$url = "documents/".rand().$fln;
	$flt = end(explode('.',$fln));
	
	move_uploaded_file($fltmp,"../documents/".$fln);

	$save = mysqli_query($link, "INSERT INTO files (uid,title,description,filetmpname,filesize,ctid,url,year,semester,filetype,courseid,subjectid,status,postdate) VALUES (1,'$fn','$desc','$fln','$fls','$filecat','$url','$yr','$sem','$flt','$cid','$sid','$sta',current_date() ) ");
		
		if ($save) {
			echo "<script>alert('Data saved Successfully...')</script>";
		}
		else{
			echo "<script>alert('Something gonna be wrong. Please contact web developer...')</script>";
		}
	
}


}

?>