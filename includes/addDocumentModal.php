<div id="docModal" class="cover">
	<div class="end"> &times; </div>
	<div class="popup-content">
		<div class="title"> Upload New Document</div>
		<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Category</td>
				<td>
					<select name="category" required="true">
					<option>Select Category</option>
					<?php
					$sql = mysqli_query($link, "SELECT * from od_category");
					while ($row=mysqli_fetch_array($sql)) {
						echo "<option value='$row[catid]'>$row[categoryname]</option>";
					}
				 	?>
				</select></td>
			</tr>	
			<tr>
				<td>Document Name</td>
				<td><input type="text" name="filename" required="true" 
placeholder="Enter Document Name"></td>
			</tr>
			<tr>
				<td>File</td>
				<td><input type="file" name="file" required="true"></td>
			</tr>
			<tr>
				<td></td><td> <input type="submit" name="upload"> </td>
			</tr>
		</table>
		</form>
	<?php

		if (isset($_POST['upload'])) {
			$filename = $_POST['filename'];
			$cat = $_POST['category'];
			$docname = $_FILES['file']['name'];
			$docsize = $_FILES['file']['size'];
			$doctmp = $_FILES['file']['tmp_name'];
			$doctype = $_FILES['file']['type'];
			$path = "documents/";
			//$docpath = $docname;
			//$doctype = end(explode(".", $docpath));
			$doc = rand().$docname;

			
				switch ($cat) {
					case 1:
						$credit = 10; // assignment
						break;
					case 2:
						$credit = 15; //Notes
						break;
					case 3:
						$credit = 20; //Sessional Papers
						break;
					case 4:
						$credit = 30; // Semester Paper
						break;
					case 5:
						$credit = 40; // Synopsis
						break;
					case 6:
						$credit = 60; // Projects
						break;
					case 7:
						$credit = 0;  // Others
						break;
					
					default:
						$credit = 0; // default
						break;
				}
				$run = mysqli_query($link, "INSERT INTO files (uid,title,filetype,filesize,filetmpname,ctid,credit,url,postdate) VALUES ('$_SESSION[userId]','$filename','$doctype','$docsize','$doc','$cat','$credit','$path$docname',current_date()) ");
				if ($run) {
					move_uploaded_file($doctmp, $path.$doc);
					echo "File has been uploaded";
				}
				else{
					die("Something goes wrong");
				}
			
		}
	 
	?>
	</div>
</div>