<?php // be aware of file / directory permissions on your server 
session_start();
$newname = ".jpg";
$id = rand(1,1000);
move_uploaded_file($_FILES['webcam']['tmp_name'],"uploads/$id".$newname); 

?>