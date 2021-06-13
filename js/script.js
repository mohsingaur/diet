// Smooth Scrolling Code
$(document).ready(function(){
 	$("a").on('click', function(event) {
		if (this.hash !== "") {
      		event.preventDefault();
      		var hash = this.hash;
      		$('html, body').animate({ scrollTop: $(hash).offset().top }, 400, function(){
      			window.location.hash = hash; });
      	}
    });
});

function changeStatus(a,b,c){
  // alert(n+""+uid+fid);
  var cnf = confirm("Are you sure?");
  if (cnf) {
    var out = document.getElementById('msg');
    var xmlhtp = new XMLHttpRequest();
    xmlhtp.onreadystatechange = function(){
      if (xmlhtp.readyState == 4 && xmlhtp.status == 200) {
        var x = xmlhtp.responseText;
      }
      if (x==1) {
        out.innerHTML = "Updated";
      }
      else{
        out.innerHTML = "Sorry";
      }
    }
    xmlhtp.open("GET","includes/changeStatus.php?uid="+a+"&fid="+b+"&n="+c,true);
    xmlhtp.send(null);
    location.reload();
  }
  else{
    exit();
  }
}

function menu() {
  var x = document.getElementById('mynav');
  // alert(x);
  if (x.className=== "mynav") {
    x.className += " resp";
  }
  else{
  x.className = "mynav";
  }
}

function loadMore(recs){
  //alert("Hello");
  var res = document.getElementById("uploads");
  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if(xml.status==200 && xml.readyState==4){
      res.innerHTML = xml.responseText;
      }
    }
  xml.open("GET","includes/latestUploads.php?recs="+recs,true)
  xml.send(null);
}

var yPos,image;
function paralX() {
  yPos = window.pageYOffset;
  image = document.getElementById('banner');
  image.style.top = yPos * 0.5 + "px";
}
function headerLine(){
  var nav = document.getElementById('mynav');
  if (yPos>50) {
    //alert(yPos);
    nav.style.borderBottom = "2px solid #fff";
  }
  else{
    nav.style.borderBottom = "0px";
  }
}

window.addEventListener("scroll",paralX,true);
window.addEventListener("scroll",headerLine);


function commentNow(id,i,j){
  var fid = id;
  var txt = document.getElementById(j);
  var div = document.getElementById(i);
  //alert(i+" "+id);
  if (txt.value=="") {
    div.innerHTML = "Please write something in the textbox";
    return false;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(xmlhttp.readyState==4 && xmlhttp.status==200){
    div.innerHTML = xmlhttp.responseText;
    }
  } 
  xmlhttp.open("GET","includes/insertComment.php?fid="+fid+"&txt="+txt.value,true);
  xmlhttp.send(null);
}

function com(id){
  var comdiv = document.getElementById(id);
  if (comdiv.style.display == "block") {
    comdiv.style.display = "none";
  }
  else{
    comdiv.style.display = "block"; 
  }
}


function signUp(){
	var user = document.getElementById('un').value;
	var email = document.getElementById('mail').value;
	var pwd = document.getElementById('pass').value;
	var upwd = document.getElementById('passs').value;
	var err = document.getElementById('sign-err');
	var output = document.getElementById('sign-res');
	if (user=="") {
		err.innerHTML = "<div class='alert alert-danger'> Enter UserName. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
    	return false;
	}
	if (email=="") {
		err.innerHTML = "<div class='alert alert-danger'> Enter Email address. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
    	return false;
	}
	if (pwd=="") {
		err.innerHTML = "<div class='alert alert-danger'> Enter Password. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
    	return false;
	}
	if (upwd!=pwd) {
		err.innerHTML = "<div class='alert alert-danger'> Password not match. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
    	return false;
	}
	var xmlhttp = new XMLHttpRequest();     
    xmlhttp.onreadystatechange = function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var out = "";
         out += xmlhttp.responseText;
        if (out==0) {
          output.innerHTML = "<div class='alert alert-danger'> Something goes wrong. Please contact admin. <b>Try again!</b>. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
        }
        else if (out==1){
          output.innerHTML = "<div class='alert alert-success' style='text-align:center;'> Thank you for registering with MyDocWorld <a href='#' data-toggle='modal' data-dismiss='modal' data-target='#login'>Login Here</a></div>";
        }
        else {
          output.innerHTML = "<div class='alert alert-danger'> Username already registered. Try another username. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
        }
      }
      
    }
    xmlhttp.open("GET","includes/signupHandler.php?uname="+user+"&email="+email+"&pwd="+pwd+"&upwd="+upwd,true);
    xmlhttp.send(null);

}

function searchPaper(str){
	//alert(str);
    var div = document.getElementById("s-modal");
    if(str.length<1){
      div.style.display = "none";  
    }
    else {
      div.style.display = "block";
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
        div.innerHTML = xmlhttp.responseText;
        }
      } 
    xmlhttp.open("GET","includes/searchmodal.php?q="+str,true);
    xmlhttp.send(null);
}

function loginNow() {
    var user = document.getElementById('uname').value;
    var userPass = document.getElementById('pwd').value;
    var errMsg = document.getElementById("error");
    var output = document.getElementById('res');
    if (user=="") {
      errMsg.innerHTML = "<div class='alert alert-danger'> Enter Email id or UserName. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
      return false;
    }
    if (userPass=="") {
      errMsg.innerHTML = "<div class='alert alert-danger'> Enter Password Please. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
      return false;
    }
    var xmlhttp = new XMLHttpRequest();     
    xmlhttp.onreadystatechange = function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var out = "";
         out += xmlhttp.responseText;
        if (out==0) {
          output.innerHTML = "<div class='alert alert-danger'> Wrong Username or Password. <b>Try again!</b>. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
        }
        else{
          output.innerHTML = "<div class='alert alert-success' style='text-align:center;'><i class='fa fa-spinner fa-spin'></i> <br>You are Logged in. Redirecting...</div>";
          location.reload();
        }
      }
      
    }
    xmlhttp.open("GET","includes/loginHandler.php?uname="+user+"&pwd="+userPass,true);
    xmlhttp.send(null);
  }

function checkUser(str){
	//alert(str);
	var output = document.getElementById("sign-res");
	var xmlhttp = new XMLHttpRequest();     
    xmlhttp.onreadystatechange = function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var out = "";
         out += xmlhttp.responseText;
        if (out==0) {
          output.innerHTML = "<div class='alert alert-danger'> Username already registered. Try another username. <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> </div>";
        }
      }
    }
    xmlhttp.open("GET","includes/checkUser.php?uname="+str,true);
    xmlhttp.send(null);
}

function upVote(fid,cnl){
  //alert(fid+" "+cnl);
  var output = document.getElementById("output");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","includes/likesHandler.php?fid="+fid,true);
  xmlhttp.send(null);
  xmlhttp.onreadystatechange = function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    var out = xmlhttp.responseText;
    }
    if (out=="true") {
      alert("You Already Like this");
    }
    else if(out=="false"){
      alert("Pease Login First to like this Document");
    }
    else if (out=="like"){
      var res = document.getElementById(cnl);
      var tmp = parseInt(res.innerHTML)+1;
      res.innerHTML = tmp;
    }
  }
}

function downVote(fid,cnl){
  //alert(fid+" "+cnl);
  var output = document.getElementById("output");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","includes/dislikeHandler.php?fid="+fid,true);
  xmlhttp.send(null);
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      var out = xmlhttp.responseText;
    }
    if (out==2) {
      alert("You Already Disliked this");
    }
    else if(out==0){
      alert("Pease Login First to like this Document");
    }
    else if (out==1){
      var res = document.getElementById(cnl);
      var tmp = parseInt(res.innerHTML)+1;
      res.innerHTML = tmp;
    }
  }
}

function pop(el){
  var div = document.getElementById(el);
  div.style.display = "block";
  var kids = div.children;
  kids[0].onclick = function(){
    div.style.display = "none";
    }
}

function popup(el,img){
  var div = document.getElementById(el); 
  div.style.display = "block";
  var kids = div.children;
  kids[0].onclick = function(){
    div.style.display = "none";
  }
  var setimg = document.getElementById('src');
  setimg.src = img;
}

function deleteDoc(fid,uid){
  var cnf = confirm("Are you Sure");
  if (cnf) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("msg").innerHTML = this.responseText;
      }
    }
    xhttp.open("GET", "includes/delete.php?fid="+fid+"&uid="+uid, true);
    xhttp.send();
    location.reload();
  }
  else{
    exit();
  }
}

function deleteArt(aid,uid){
  var cnf = confirm("Are you Sure");
  if (cnf) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("msg").innerHTML = this.responseText;
      }
    }
    xhttp.open("GET", "includes/delete.php?aid="+aid+"&uid="+uid, true);
    xhttp.send();
    location.reload();
    }
  else{
    exit();
  }
}

function changeTitle(el,id){
  var div = document.getElementById(el);
  div.style.display = "block";
  var kids = div.children;
  kids[0].onclick = function(){
    div.style.display = "none";
  }
  document.getElementById('fid').value = id;
}
