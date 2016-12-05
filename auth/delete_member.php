<?php
include('dbcon.php');
$id=$_POST['id'];
mysql_query("delete from members where member_id='$id'") or die(mysql_error());
?>