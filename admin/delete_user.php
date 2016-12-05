<?php
include('dbcon.php');
$id=$_POST['id'];
mysql_query("delete from users where user_id='$id'") or die(mysql_error());
?>