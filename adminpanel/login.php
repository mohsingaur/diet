<?php
session_start();
if(isset($_SESSION['adminid'])){
	header("location:index.php");
	}
else {

include 'includes/config.php';

//For Login
extract($_POST);
if(isset($login)){
	$p = md5($pwd);
	
	$sel = mysqli_query($link, "SELECT * FROM administrator WHERE username='$uname' AND password='$p' AND adminstatus=1 ");
	mysqli_num_rows($sel);
	if (mysqli_num_rows($sel)==1) {
		$row = mysqli_fetch_assoc($sel);
			$_SESSION['adminid'] = $row['admnid'];
			echo "<script>window.open('index.php','_self')</script>";
	}
	else{
		echo "<h3 style='text-align:center; color:red;'>Enter Correct Username Or Password</h3>";
		@session_destroy();
		exit();
	}
}



// For Registration
extract($_POST);
if (isset($signup)) {
  $p = md5($pass);
  $sel = mysqli_query($link, "SELECT * FROM administrator WHERE username='$uname' ");
  if (mysqli_num_rows($sel)>0) {
    echo "
      <div class='alert'>
      <div class='alert alert-danger'>
        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Sorry!</strong> Already Registered.
      </div>
      </div>";
    //echo "<script>window.open('index.php?c=Already Registered','_slef')</script>";
  }
  else{
  $ins = mysqli_query($link,"INSERT INTO administrator (username,email,password,password1,joiningdate) VALUES ('$uname','$email','$p','$pass1',current_date())" );
  if($ins){
    echo "<div class='alert'>
      <div class='alert alert-success'>
        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Thanks!</strong> For registration.
      </div>
      </div>";
  }
  else{
    echo "<div class='alert'>
      <div class='alert alert-danger'>
        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Sorry!</strong> Something goes wrong.
      </div>
      </div>";
  }
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet/sas-style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.css">
	<script src="bootstrap/js/bootstrap.js" type="text/javascript" ></script>
  <script src="jquery/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="javascript/sel-course.js"></script>
	

<script>

function ajaxLogin(){
	var uname = Form.uname.value;
	var pass = Form.pwd.value;
	var div = document.getElementById('res');
  var reply;
	if(uname==''){
		div.innerHTML = "<h5>Please Enter User Name</h5>";
    return false;
		}
	else if(pass==''){
		div.innerHTML = "<h5>Please Enter Password</h5>";
    return false;
		}
	else{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				reply = xmlhttp.responseText;
        }
        if (reply==1) {
          window.location.href = "index.php";
        }
        else if(reply==0){
          div.innerHTML = "<h5>Enter correct Username Or Password</h5>";
      }
		}
		xmlhttp.open("GET","loginhandler.php?u="+uname+"&p="+pass,true);
		xmlhttp.send(null);
		}
    return false;    
	} 

  function forgotPwd(){
    var uname = document.getElementById('username').value;
    var email = document.getElementById('useremail').value;
    var out = document.getElementById('ajres');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(xhttp.readyState==4 && xhttp.status==200){
        var reply = xhttp.responseText;
      }
      if (reply==0) {
      out.innerHTML = "<span class='text-danger'>Wrong username or email</span>";
      return false;
    }
    else{
      out.innerHTML = "<span class='text-success'>An Email send to "+email+"<span>";
    }
    }
    xhttp.open("GET","includes/forgotPwd.php?u="+uname+"&e="+email,true);
    xhttp.send(null);
  }

  function checkUser(user){
    var out = document.getElementById('check');
    out.innerHTML = user;
    var xh = new XMLHttpRequest();
    xh.onreadystatechange = function(){
      if(xh.readyState==4 && xh.status==200){
      var reply = xh.responseText;
      }
      if (reply==1) {
      out.innerHTML = "<i class='fa fa-times' style='color:red;'></i>";
    }
    else{
      out.innerHTML = "<i class='fa fa-check' style='color:green;'></i>";
    }
    }
    xh.open("GET","includes/checkUser.php?u="+user,true);
    xh.send(null);
    setTimeout(function(){ out.innerHTML = "" }, 15000);
  }
</script>
</head>
<body>

<div class="shadow-box">
    <h2>ODSP Admin Login</h2>
    <p>Enter correct user id and password to access index account.</p><hr>
      <form class="form" name="Form" method="post" onsubmit="return ajaxLogin()">
      <div id='res' style='text-align:center; color:red;'></div>
        UserId<input type="text" name="uname">
        Password<input type="password" name="pwd" id="pas">
        <input type="submit" value="Login"> 
      </form>
      <hr>
      <a href="#" class="btn btn-sm btn-primary" data-toggle='modal' data-target='#regModal' data-dismiss="modal" aria-label="close">Add New Admin</a>
      <a href="#" class="btn btn-sm btn-warning" data-toggle='modal' data-target='#passModal' data-dismiss="modal" aria-label="close">Forgot Password</a>
  </div>


<!-- Registration Modal starts here -->
<div id="regModal" role="dialog" class="modal fade">
	<div class="modal-dialog">
    <div class="col-md-10">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-sign-in"></span> Sign Up</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px 10px 50px;">

          <!-- <div id="ajaxres" style="color:#fff;">
            <div id="load"></div>
          </div>
 -->
		<form class="form-horizontal" method="post">
  			
        <div class="form-group">
    		  <label class="control-label col-md-4" for="name">User Name</label>
          <div class="col-md-7">
      			<input type="text" class="form-control" id="name" name="uname" placeholder="User Name" onchange="checkUser(this.value)" required="true">
          </div>
            <span id="check" style="text-align: center;"></span>
        </div>
            
          <div class="form-group">
    			 <label class="control-label col-md-4" for="mail">Email </label>
           <div class="col-md-7">
      			 <input type="email" class="form-control" id="mail" name="email" placeholder="Email" required="true">
            </div>
          </div>
           
          <div class="form-group">
            <label class="control-label col-md-4" for="pwd">Password </label>
            <div class="col-md-7">
              <input type="password" class="form-control" id="pwd" name="pass" placeholder="Password" required="true">
              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-4" for="pass1">Confirm Password</label>
            <div class="col-md-7">
              <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password Again" onkeyup="matchPass(this.value)"> <span id="pasres"></span>
            </div>
          </div>
  			 <button type="submit" class="btn btn-info" name="signup">Signup Now</button>
        <br><br>
        
		</form>
        </div>
      </div>
    </div>
</div>
</div>

<!-- forgot password Modal starts here -->
<div id="passModal" role="dialog" class="modal fade">
  <div class="modal-dialog">
    <div class="col-md-10">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close flt-rt" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Forgot Password</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px 10px 50px;">

          <!-- <div id="ajaxres" style="color:#fff;">
            <div id="load"></div>
          </div>
 -->
    <form class="form-horizontal">
        
        <div class="form-group">
          <label class="control-label col-md-4" for="name">Username</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="username" name="uname" placeholder="User Name">
          </div>        
        </div>
            
        <div class="form-group">
          <label class="control-label col-md-4" for="mail">Email </label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="useremail" name="email" placeholder="Email">
          </div>
        </div>

        <div>
          <input type="button" class="btn btn-sm" value="Reset Your Password" onclick="forgotPwd()">
        </div>

        <br><div id="ajres" class="pan pan-warning" style="text-align: center;"></div><br>
    </form>
    
        </div>
      </div>
    </div>
</div>
</div>

	     

    
</body>
</html>

<?php } ?>