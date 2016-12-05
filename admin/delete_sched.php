<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysql_query("delete from schedule where id = '$get_id' ")or die(mysql_error());
header('location:schedule.php');
?>