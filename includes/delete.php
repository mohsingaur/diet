<?php
	session_start();
	include "config.php";

	$uid = @$_GET['uid'];  // Getting user id
	$aid = @$_GET['aid']; // Getting Delete id.
	$deldoc = @$_GET['fid']; // getting document or file id i.e fid
	if (isset($aid)) {
		$delsql = mysqli_query($link, "DELETE FROM articles WHERE aid=$aid AND uid=$uid");
		if ($delsql) {
			echo "Data has been deleted";
		}
		else{
			echo "Something going wrong with your internet connection";
		}
	}
	else{
		$delsql = mysqli_query($link, "DELETE FROM files WHERE fileid=$deldoc AND uid=$uid");
		if ($delsql) {
			echo "Data has been deleted";
		}
		else{
			echo "Something going wrong with your internet connection";
		}
	}
?>