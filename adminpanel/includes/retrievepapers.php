<?php
				$search = "SELECT * FROM papers ORDER BY year ASC ";
				$run_search = mysqli_query($link,$search);
				if ($run_search) {
				echo "
				<table class='table table-bordered'>
					<tr>
						<th>File ID</th><th>File Name</th><th>Subject</th><th>Semester</th><th>Year</th><th>Delete</th><th>Status</th>
					</tr>";
				while ($row=mysqli_fetch_assoc($run_search)) {
				$pid = $row['pap_id'];
				$cid = $row['cid'];
				$subj = $row['subject_name'];
				$yr = $row['year'];
				$sem = $row['semester']; 
				$filn = $row['file_name'];
				$st = $row['status'];
			echo "<tr><td>".$pid."</td><td><a href='files/papers/$filn'>".$filn."</a></td><td>".$subj."</td><td>".$sem."</td><td>".$yr."</td>
			<td>
			<span title='Delete $filn' onClick='del($pid)'><i class='fa fa-trash'></i></span>
			</td>
			<td>$st</td>
			</tr>";
		}
		echo "</table>";
	}
echo "<div id='del' style=' padding:10px; font-size:16px; text-align:center;'>".@$_GET['del']."</div>";
?>
        