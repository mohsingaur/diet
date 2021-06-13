<!DOCTYPE html>
<html>
<head>
	<title>Ajax Search</title>
	<style type="text/css">
		#text{display:none; position: fixed; top: 20px; right: 50px; background: silver; width: 400px;}
		table{border-collapse: collapse; margin: 10px;}
		table td{border: 1px solid blue; text-align: center;}

	</style>
</head>
<body>
<form>
	Enter Text<input type="text" name="search" onkeyup="ajaxsearch(this.value)">
</form>
<div id="text"></div>
<script>
function _(el) {
	return document.getElementById(el);
}
	function ajaxsearch(str) {
		_("text").style.display = "block";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				_("text").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST", "searchmodal.php?q=" + str, true);
        xmlhttp.send();
	}
</script>

</body>
</html>