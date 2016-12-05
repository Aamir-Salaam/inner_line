<html>
<head>
<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<script type="text/javascript">

function getcaptcha()
{
	$.ajax({
			type: 'post',
			url: 'captcha.php',
			success: function (response) {
			$('#captcha').attr('src','captcha.php')
			}
		   });
}	
</script>

</head>
<body>
<div class="alert alert-info">Please Enter The Details Below</div>
<div class="lgoin_terry">
<form method="POST" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputPassword">Username</label>
			<div class="controls">
			<input type="text" name="username"  placeholder="Username" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
			<input type="password" name="password" placeholder="Password" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Captcha:</label>
			<div class="controls">
		     <img src="captcha.php" width="150" height="100" id="captcha">
			 <img src="img/refresh.png" onClick="getcaptcha();" />
			 <br/>
			</div>
		</div>
		    <div class="control-group">
			<label class="control-label">Enter Captcha Code:</label>
			<div class="controls">
	         <input type="text" name="captcha_text">
			</div>
		</div>
		
		<div class="control-group">
			
			<div class="controls">
			<div class="please">Please fill in the fields</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button name="submit1" type="submit" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
			</div>
		</div>
        <?php


if (isset($_POST['submit1'])){
$user_captcha = $_POST['captcha_text'];
if($user_captcha==$_SESSION['captcha'])
{
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row > 0 ) {		
	
	$_SESSION['username']=$row['username'];
	$_SESSION['role_id']=$row['role_id'];
	$_SESSION['u_id']=$row['user_id'];
    $id = $row['user_id'];
	$role_id = $row['role_id'];
	$name = $row['username'];
	?>
		<?php
	if($role_id == 99) {
	      
		  
	?>
	  <script>
	  window.location="admin/user.php";
	</script>
	<?php
	}
	else if($role_id == 1){ 

		  
		   ?>
	
	 <script>
	  window.location="auth/user.php";
	</script>
	
	<?php
	}
	else if($role_id == 3){
	
		  
	 ?>
	     
		 <script>
		   window.location="deo/dasboard.php";
		 </script>
    <?php
	}
	?>	
	
	<?php	}
		else{ ?>
		<div class="alert alert-danger"><strong>Login Error!</strong>&nbsp;Please check your Username and Password</div>
	<?php	
	}	
		}
		else
         {
              echo "Wrong Captcha Please Try Again";
          }
		}
?>		
			
	</form>
	</div>
	</body>
	</html>