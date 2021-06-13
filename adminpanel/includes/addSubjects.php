<div class="mypanel">
	<div class="mypanel-header">
		<h2>Add New Subjects in the Database</h2>
	</div>
    <div class="mypanel-body">
    	<div class="row">
        <div class="col-md-8">
  		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
    			<li role="presentation" class="active"><a href="#addsubject" role="tab" data-toggle="tab" aria-controls="add">Add New Subject</a></li>
    			<li role="presentation"><a href="#addcourse" role="tab" data-toggle="tab" aria-controls="add">Add New Course</a></li>
    			<li role="presentation"><a href="#list" role="tab" data-toggle="tab" aria-controls="list">Subject List</a></li>
  			</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="addsubject">
				<form method="post" role="form" class="col-md-6">
					<input type="text" name="sname" placeholder="Subject Name" oninvalid="setCustomValidity('Enter Subject name')" required>
            <?php
			$selcr = mysqli_query($link, "SELECT * FROM course");
			echo "<select name='cid'> <option>Select Course</option>";
			while($ft=mysqli_fetch_assoc($selcr)){
				echo "<option value='$ft[cid]'>$ft[c_name]</option>";
				}		
				echo "</select>";
			?>
				<input type="radio" name="status" value='1'>Active
				<input type="radio" name="status" value='0'>Inactive
				<input type="submit" name="save" value="Save">
			</form>
		</div>


	<div role="tabpanel" class="tab-pane" id="addcourse">
		<form method="post" role="form" class="col-md-6">
			<input type="text" name="cname" placeholder="Course Name" oninvalid="setCustomValidity('Enter Course name')" required>
         <input type="radio" name="status" value='1'>Active
			<input type="radio" name="status" value='0'>Inactive
			<input type="submit" name="save" value="Save">
		</form>
	</div>




	<div role="tabpanel" class="tab-pane" id="list">
    	<?php
			$run = mysqli_query($link, "SELECT * FROM subjects");
			echo "<ul>";
			while($row=mysqli_fetch_assoc($run)){
				echo "<li>$row[sname]</li>";
				}		
				echo "</ul>";
		?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
if(isset($_POST['save'])){
	$sn = $_POST['sname'];
	$cid = $_POST['cid'];
	$st = $_POST['status'];
	$qr = mysqli_query($link, "INSERT INTO subjects (sname,cid,status) VALUES ('$sn','$cid','$st')");
	if($qr){
		echo "Data Saved Successfully";
		}
	else{
		echo "OOps! Save Again...";
		}
	}
?>