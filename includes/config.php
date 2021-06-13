<?php
if($_SERVER['HTTP_HOST']=="localhost"){
$host = "localhost";
$user = "root";
$password = "";
$database = "mydocworld";

}
else{
$host = "192.168.8.102";
$user = "root";
$password = "";
$database = "mydocworld";

}


$link = @mysqli_connect($host,$user,$password,$database) or die('Connection Failed To localhost');

?>