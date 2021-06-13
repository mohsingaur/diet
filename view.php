<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include 'includes/config.php';
	include 'includes/heads.php';
	?>

<style type="text/css">
	::-webkit-scrollbar{ width: 5px;}
	::-webkit-scrollbar-thumb{ background-color: #aaa; }
</style>

<script type="text/javascript">
	
	function docDownload(uid,fid,catid,cr){
		//alert(uid+fid+catid+cr);
		var t_cr = <?php echo $total_credit; ?>;
    	if (t_cr<-10) {
        	alert("Not enough credit to download this document. Please upload some documents to get credit points.");
 	     	return false;
    	}
    	else{
    		//alert(uid+" "+fid+" "+catid+" "+cr);
 			var res = document.getElementById("downloadalert");
 	        var xmlhttp = new XMLHttpRequest();
 	        xmlhttp.onreadystatechange = function(){
 	        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
 	        	res.innerHTML = xmlhttp.responseText;
	        	}
        	}
        	xmlhttp.open("GET","includes/docdownload.php?fid="+fid+"&uid="+uid+"&cid="+catid+"&cr="+cr,true);
	    	xmlhttp.send(null);
    	}
	}
</script>
</head>
<body>

<?php
include 'includes/nav.php';
include 'includes/credits.php';
include 'includes/loginModal.php';

if (isset($_GET['fn'])) {

$filename = @$_GET['fn'];  // Get the file name or document name
$ext = explode('.', $filename); // Split the file name to distinguish the extension type
$filetype = end($ext);

$img = @$_GET['artimg']; // Get the article image
$ext1 = explode('.', $img); // Split the article image name to identify the type of the image.
$artimgtype = end($ext1);


if ($filetype=="pdf") {
	$file =  "<embed src='documents/$filename' width='100%' height='100%'></embed>";
}
elseif ($filetype=="xlsx" || $filetype=="xls" || $filetype=="docx" || $filetype=="doc" || $filetype=="pptx" || $filetype=="ppt") {
	$file = "<a href='documents/$filename' width='100%' height='100%'>a</a>";
}
elseif ($filetype=="bmp" || $filetype=="gif" || $filetype=="jpg" || $filetype=="png" || $filetype=="JPG" || $filetype=="jpeg" || $filetype=="JPEG") {
	$file = "<img src='documents/$filename' > ";
}

elseif ($artimgtype=="pdf") {
	$file = "<embed src='articlesimages/$img' width='100%' height='100%'></embed>";
}

elseif ($artimgtype=="bmp" || $artimgtype=="gif" || $artimgtype=="jpg" || $artimgtype=="JPG" || $artimgtype=="jpeg" || $artimgtype=="JPEG" || $artimgtype=="png" || $artimgtype=="PNG") {
	$file = "<img src='articlesimages/$img' height='100%' max-width='100%'> ";
}

$query = mysqli_query($link,"SELECT f.uid, f.postdate, f.*, c.*, s.*, u.* FROM files f LEFT JOIN course c ON f.courseid=c.cid LEFT JOIN subjects s ON f.subjectid=s.sid LEFT JOIN od_users u ON f.uid=u.uid WHERE f.filetmpname='$filename' ");
$count = mysqli_num_rows($query);
$row=mysqli_fetch_array($query);

$ct = mysqli_query($link, "SELECT * FROM od_category d WHERE d.catid=$row[ctid] "); // Query for fetching all columns from category table
$d=mysqli_fetch_array($ct); // fetching specific document category from doccategory table and store in $d variable

// Count Likes and dislikes
$countlikes = mysqli_query($link,"SELECT count FROM upvote WHERE fid=$row[fileid]");
@$cnl = mysqli_num_rows($countlikes);
$countdlikes = mysqli_query($link,"SELECT dcount FROM downvote WHERE fid=$row[fileid]");
@$cndl = mysqli_num_rows($countdlikes);
//$date = date_format(date_create_from_format('Y-m-d h:m:s', $row[1]), 'D d-m-Y');
// calculate file size
$size = ceil($row['filesize']/1024);

?>

<div class="view-panel">
	<div class="hed">
		<?=$d['categoryname']?>
	</div>

	<div class="view-body">
		<div class="side-bar">
			<?=@$file;?>
		</div>

		<div class="view-content">
			<div class="p-title">
				<?=$row['title']?> 
			</div>
		
			<div class="p-nav">
				<table class="table">
					<tr>
						<td> <b>Course:</b> </td> <td> <i title="Course"> <?=$row['c_name']?> </i> </td>
					</tr>
					<tr>
						<td> <b>Subject: </b> </td> <td> <i title="Subject"> <?=$row['sname']?> </i> </td>
					</tr>
					<tr>
						<td> <b>Semester: </b> </td> <td> <i title="Semester"> <?=$row['semester']?> Sem</i> </td>
					</tr>
					<tr>
						<td> <b>Year: </b> </td> <td> <i title='Year'> <?=$row['year']?> </i> </td>
					</tr>
					<tr>
						<td> <b>Document Type: </b> </td> <td> <?=$row['filetype']?> (<?=$size?> KB) </td>
					</tr>
					<tr>
						<td> <b>Description:</b> </td> <td> <p><?=$row['description']?></p> </td>
					</tr>
				</table>
			</div>
			<hr>
			<div class='p-footer'>
				<div class='p-left flt-lt'>
				&nbsp; <i class='fa fa-thumbs-up' title='Upvote (<?=$cnl?>)' onclick='upVote(<?=$row['fileid']?>,<?=$cnl?>)'></i> (<span id='<?=$cnl?>'><?=$cnl?></span>) &nbsp; | &nbsp; (<span id='cnld'><?=$cndl?></span>) <i class='fa fa-thumbs-down fa-flip-horizontal' title='Down Vote (<?=$cndl?>)' onclick='downVote(<?=$row['fileid']?>)'></i> &nbsp; | &nbsp; <i class='fa fa-comments' title='No of Comments' ></i> &nbsp; | &nbsp; <i class='fa fa-flag' title='Report'></i> &nbsp;
				</div>

				<div class='p-right flt-rt'>
				<?php if (isset($_SESSION['userId'])) {
				?>
					<i class='fa fa-certificate' title='Credits' style='color:blue;'></i> <?=$row['credit']?> Points | &nbsp; <a href="documents/<?=$row['filetmpname'];?>" class='pan-button' onclick="docDownload(<?=$_SESSION['uid']?>,<?=$row['fileid']?>,<?=$row['catid']?>,<?=$row['credit']?>)" download> Download <i class='fa fa-download' ></i> </a> &nbsp;
					<span id='downloadalert'></span>
				<?php } 
				else{
					echo "<span style='color:#0f0; cursor:pointer;' href='#' data-toggle='modal' data-target='#myModal' yle='margin: 2px 1px;'><span class='glyphicon glyphicon-log-in'></span> Login to Download</span>";
				} ?>
				</div>
			</div>

		</div>
		<div class="clrfix"></div>
	</div>

</div>


<?php } ?> <!-- isset function ends here -->


</body>
</html>