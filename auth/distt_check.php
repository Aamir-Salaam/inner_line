<?php

@$distt=$_GET['distt'];

require "config.php";

$sql="select auth_name,auth_code from authority_mas where auth_distt_code='$distt'";

$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$add_user = array('data'=>$result);
echo json_encode($add_user);


///session_start();
////unset($_SESSION['distt_value']);

////$distt_value = $_POST['disttvalue'];
////$_SESSION['distt_value'] = $distt_value;


?>
