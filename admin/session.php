<?php
//Start session

session_start();

if($_SESSION['role_id'] != 99){ ?>
<script>
window.location = "logout.php";
</script>
<?php
}
//Check whether the session variable SESS_MEMBER_ID is present or not
/*
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header("location: index.php");
    exit();
}
*/
$session_id=$_SESSION['u_id'];
?>