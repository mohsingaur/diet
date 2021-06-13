<?php

if (!isset($_SESSION['adminid'])) {
	header('location:login.php');
}
else{
?>

<div class="col-md-10">
	<b>Welcome to SAS-Education Admin Panel</b>
</div>
<div class="col-md-2">
	<!-- <div id="time"></div> -->
    <form>
		<input type="text" placeholder="Enter Text" onkeyup="searchPaper(this.value)">
    </form>
    <div id="text"></div>
</div>

<?php } ?>


<script>
	function _(el) {
	return document.getElementById(el);
	}
	var textdiv = _("text");
	function searchPaper(str){
		textdiv.style.display = "block";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById('text').innerHTML = xmlhttp.responseText;
				}
			}	
		xmlhttp.open("GET","includes/searchmodal.php?q="+str,true);
		xmlhttp.send(null);
	}
</script>