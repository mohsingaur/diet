<?php

$sql = mysqli_query($link,"SELECT * FROM od_users WHERE uid=$_SESSION[userId]");
$user = mysqli_fetch_assoc($sql);

?>