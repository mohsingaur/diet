<div id="artModal" class="cover">
	<div class="end"> &times; </div>
	<div class="popup-content">
		<div class="title"> Post a new Article </div>
		<form method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Title*</td>
					<td><input type="text" name="articletitle" placeholder="Title" required="true"></td>
				</tr>
				<tr>
					<td>Tags</td>
					<td><input type="text" name="articletags" placeholder="Tags eg Hi, Hello etc"></td>
				</tr>
				<tr>
					<td>Image</td>
					<td><input type="file" name="articleimage" placeholder="Image"></td>
				</tr>
				<tr>
					<td>Article*</td>
					<td style="padding-left: 20px;"><textarea name="editor1" id="editor1" placeholder="Content" required="true"></textarea></td>
					<script type="text/javascript">
						CKEDITOR.replace('editor1');
					</script>
				</tr>
				<tr>
					<td></td> <td> <input type="submit" name="savearticle" value="Save"> </td>
				</tr>
			</table>
		</form>

<?php
	if (isset($_POST['savearticle'])) {
		$articletitle = $_POST['articletitle'];
		$articlecontent = $_POST['editor1'];
		$articletags = $_POST['articletags'];
		$articleimage = $_FILES['articleimage']['name'];
		$articleimagename = rand().$articleimage;
		$url = "douments/".$articleimagename;
		$articleimgtype = $_FILES['articleimage']['type'];
		$articleimgsize = $_FILES['articleimage']['size'];
		$articleimgtmp = $_FILES['articleimage']['tmp_name'];
		if ($articleimgtype != "image/jpeg" && $articleimgtype != "image/png" && $articleimgtype != "image/gif" && $articleimgtype != "image/bmp" ) {
			echo "Only jpeg/png/gif/bmp files supported.";
			exit();
		}
		elseif ($articleimgsize>3000000) {
			echo "Maximum size should not exceed 2MB";
			exit();
		}
		else{
			move_uploaded_file($articleimgtmp, "images/".$articleimagename);
			$insarticle = mysqli_query($link, "INSERT INTO files (fileid,uid,title,description,tags,filetype,filesize,filetmpname,ctid,url,postdate,status) VALUES ('','$_SESSION[userId]','$articletitle','$articlecontent','$articletags','$articleimgtype','$articleimgsize','$articleimagename',7,'$url',current_date(),1 ) ");

			if ($insarticle) {
				echo "Successfully Saved.";
			}
			else{
				echo "Sorry Something goes wrong.";
			}
		}
	}
?>

	</div>
</div>
