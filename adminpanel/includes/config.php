<?php
if($_SERVER['HTTP_HOST']=="localhost"){
$host = "localhost";
$user = "root";
$password = "";
$database = "mydocworld";

}
else{
$host = "mysql.hostinger.in";
$user = "u364749784_odsp";
$password = "chating";
$database = "u364749784_odsp";

}


$link = @mysqli_connect($host,$user,$password,$database) or die('Connection Failed To localhost');

?>