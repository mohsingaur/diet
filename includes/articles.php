<?php
include 'includes/addNewArticleModal.php';

 $msg = @$_GET['msg'];
	if ($msg) {
		echo "<h4>".$msg."</h4>";
	}
 ?>
<h2>My Articles</h2>

<button class="btn btn-info btn-xs fltrt" title="Post New Article" onclick="pop('artModal')" style="position: absolute; top: 0px; right: 5px;"> <i class="fa fa-plus-circle fa-2x"></i> </button>

<?php

$articlesql = mysqli_query($link,"SELECT * FROM files WHERE ctid='7' AND uid='$_SESSION[userId]' ");
$count = mysqli_num_rows($articlesql);
if ($count==0) {
	echo "<h4>No Articles posted yet...</h4>";
	}
	else{
		while ($row=mysqli_fetch_array($articlesql)) {
			$artid = $row['fileid'];
			$user = $_SESSION['userId'];
		echo "
		<div class='col-md-4'>
		<div class='art-box'>
			<div class='art-header'>
				<b>$row[title]</b>
			</div>
			<div class='art-content'>
				<p><a href='view.php?fn=$row[filetmpname]'><img src='images/$row[filetmpname]' width='150' height='150'></a> $row[description]</p>
			</div>
			<div class='art-footer'>
				
				<a href='javascript:void(0)' onclick='deleteDoc($artid,$user)' > <i class='fa fa-trash-o'></i> </a> 
				<a href='javascript:void(0)'> <i class='fa fa-pencil' title='Edit'></i> </a>
				<a href='javascript:void(0)'> <i class='fa fa-share-alt-square' title='Share'></i> </a>
			</div>
		</div>
		</div>";

			}
		}
		?>