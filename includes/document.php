<?php
include 'includes/addDocumentModal.php';
?>


<div id="msg"></div> <!-- To get the popup message -->
<?php echo @$_GET['msg']; ?>
<h2>My Documents</h2>

<button class="btn btn-info btn-xs fltrt" title="Add New Document" onclick="pop('docModal')" style="position: absolute; top: 0px; right: 5px;"> <i class="fa fa-plus-circle fa-2x"></i> </button>


<?php
	$docList = mysqli_query($link, "SELECT * FROM files f, od_category o WHERE (f.ctid<>7 AND f.ctid=o.catid) AND f.uid='$_SESSION[userId]' ");
	while($dcl = mysqli_fetch_array($docList)){
		$st = $dcl['status'];
		$fld = $dcl['fileid'];
		$ud = $dcl['uid'];
		if ($st==1) {
			$str = "<i class='fa fa-user' title='Public'></i>";
			$cr = "<i class='fa fa-certificate' title='credit Points'> $dcl[credit]</i>";
		}
		else if($st==0){
			$str = "<i class='fa fa-lock' title='Private'></i>";
			$cr = "<i class='fa fa-certificate' title='Credit Point'> 0 </i>";
		}
?>
<div class="col-md-4">
	<div class="panel panel-info">
		<div class="panel-heading">
			<?=$dcl['title']?>
		</div>
		<div class="panel-body">
			<b>Category:</b> <?=$dcl['categoryname'] ?><br>
			<b>Description:</b><?=$dcl['description']?> <br>
			<b>Type:</b>
		</div>
		<div class="panel-footer" style="text-align: center;">
			<a href='st.php?ud=<?=$ud?>&fld=<?=$fld?>&st=<?=$st?>'> <?=$str?> </a> | <?=$cr?> | <a href='javascript:void(0)' onclick='deleteDoc(<?=$fld?>,<?=$ud?>)' > <i class='fa fa-trash-o'></i> </a> | <i class='fa fa-edit' onclick="changeTitle('editTitle',<?=$fld?>)"></i>
		</div>
	</div>
</div>

<?php } ?>
