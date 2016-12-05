<?php
include('dbcon.php');
$get_id = $_GET['id'];


mysql_query("update schedule set status = 'Done' where id = '$get_id' ")or die(mysql_error());
header('location:sched_today.php'); 
?>