<?php
$alldocs = mysqli_query($link,"SELECT * FROM files WHERE uid='$_SESSION[userId]' AND ctid<>'7' ");
$doccount = mysqli_num_rows($alldocs);
$allarts = mysqli_query($link,"SELECT * FROM files WHERE uid='$_SESSION[userId]' AND ctid='7' ");
$artcount = mysqli_num_rows($allarts);

?>

<h2>Dashboard</h2>

			<div class="updates">
				<div class="docs">
					<b><?=$doccount ?></b> <br> <a href="acc.php?document">Documents</a>
					<i class="fa fa-file fa-3x"></i>
				</div>
				<div class="docs">
					<b><?=$artcount ?></b> <br> <a href="acc.php?articles"> Articles</a>
					<i class="fa fa-list-alt fa-3x"></i>
				</div>
				<div class="docs">
					<b><?php echo "0" ?></b> <br> <a href="acc.php?services"> Messages</a>
					<i class="fa fa-envelope fa-3x"></i>
				</div>
				<div class="docs">
					<b><?=@$total_credits?></b> <br> <a href="acc.php?crrs"> Total Credits</a>
					<i class="fa fa-check-circle-o fa-3x"></i> 
				</div>
			</div>

			<div class="title-bar">
				Recent activities
			</div>

			<div class="recent">
				<table>
			<?php
		//Query for fetching documents from database
		$recents = mysqli_query($link,"SELECT * FROM files f, od_category o WHERE f.uid='$_SESSION[userId]' AND f.ctid=o.catid ORDER BY fileid desc LIMIT 6");
		$reccount = mysqli_num_rows($recents);

		if ($reccount==0) {
			$norecs = "No Recent activity yet";
		}
		else{
			while ($rart=mysqli_fetch_array($recents)) {
				$title = $rart['title']; 
				$artcontent = $rart['description'];
				$img = $rart['filetmpname']; //image temo name
				$cat = $rart['categoryname'];
				$date = $rart['postdate'];
		?>
					<tr>
						<td>
						<object data="documents/<?=$img ?>" type="application/pdf" height="60" width="100"> alt:  </object>
						</td>
						<td>
							<div class="title"> <b> <a href='view.php?fn=<?=$img ?>'><?=$title ?></a> </b> </div>
							<div class="category"><?=$cat ?></div>
							<div class=""> <?=$date ?> </div>
						</td>
					</tr>

		<?php } } ?>


				</table>
			</div>