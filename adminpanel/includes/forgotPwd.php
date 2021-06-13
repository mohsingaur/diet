<?php
include 'config.php';

$username = $_GET['u'];
$email = $_GET['e'];

$sql = mysqli_query($link, "SELECT username, email FROM administrator WHERE username='$username' AND email='$email' ");
$count = mysqli_num_rows($sql);
if ($count==1) {
	$to = $email;
	$from = "From:forgotPwd@odsp.com \r\n";
	$subject = "Reset your Password";
	$msg = "Someone is trying to change your Password. If you are doing this, Please <a href=''>Click Here</a> to reset you Password.";
    $header = $from;
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    $st = mail ($to,$subject,$msg,$header);
   if($st==true){
         echo 1;
    }
    else{
    	echo 0;
    }
}
else{
	echo 0;
}


?>