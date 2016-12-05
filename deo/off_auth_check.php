<?php

@$distt=$_GET['distt'];

require "config.php";

$sql="select office_auth_name,office_auth_code from office_mas where distt_id='$distt'";

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
