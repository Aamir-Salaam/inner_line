<?php
include('dbcon.php');
$id=$_POST['id'];
mysql_query("delete from service where service_id='$id'") or die(mysql_error());
?>