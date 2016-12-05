<html>
<head>
<script type="text/javascript">

function validate(){

var $username = document.add_user_frm.username.value;
var $password = document.add_user_frm.password.value;
var $state = document.add_user_frm.state.value;
var $district = document.add_user_frm.district.value;
var $auth_nm = document.add_user_frm.auth_nm.value;
var $role = document.add_user_frm.role.value;
var $offc_auth = document.add_user_frm.offc_auth.value;
if($username==''||$password=='' ||$state=='' ||$district=='' ||$role=='')
alert("Please fill all the * marked fields");
else
   {       if($password.length<6){

            //password.setCustomValidity("Password must contain atleast six characters!!");
			alert("Password must contain atleast six characters!!");

       }
        else{
            var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;  
                 if($password.match(decimal))   
                {  
				   <?php
                         if (isset($_POST['submit'])) {
                         $username = $_POST['username'];
                         $password = $_POST['password'];
                         $password = md5($password+"Aamir");
                         mysql_query("insert into users (username,password) values('$username','$password')")or die(mysql_error());
                       }
                   ?>
                   alert("Submission Successful");
                      
                }  
                 else  
                {  
				    //password.setCustomValidity("Password must contain one uppercase characrter, one lowercase character, one number, and one special character."); 
                    alert('Password must contain one uppercase character, one lowercase character, one number, and one special character.')  
                      
                }  
            }
    } 	 
}

</script>
<title></title>
</head>

<body>
<p><a  href="#adduser" data-toggle="modal" class="btn btn-info" ><i class="icon-plus"></i>&nbsp;Add user</a></p>
<div id="adduser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div><p><strong>Registration:</strong></p></div>
        <form class="form-horizontal" method="post" name="add_user_frm">
		<fieldset>
	    <div class="alert alert-info"><strong>User Credentials:</strong></div>
		<legend></legend>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Username:</label>
                <div class="controls">
                    <input type="text" id="username" name="username" placeholder="Username" required maxlength="35">&nbsp*
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Password:</label>
                <div class="controls">
                    <input type="password" name="password" id="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}">&nbsp*
                </div>
            </div>
			</fieldset>
			<fieldset>
		    <div class="alert alert-info"><strong>Area Information:</strong></div>
			<legend></legend>
			<div class="control-group">
                <label class="control-label">State:</label>
                <div class="controls">
                    <select name="state" id="state" required>
					   <option name="state" value="hp" selected="selected">Himachal Pradesh</option>
					</select>&nbsp*   
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">District:</label>
                <div class="controls">
                    <select name="district" id="district" required>
					   <option name="district" value="" hidden>Select</option>
					   <option name="district" value="shimla">Shimla</option>
					</select>&nbsp*   
                </div>
            </div>
			</fieldset>
			<fieldset>
			<div class="alert alert-info"><strong>Authority Information:</strong></div>
			<legend></legend>
			<div class="control-group">
                <label class="control-label">Authority Name:</label>
                <div class="controls">
                    <select name="auth_nm" id="auth_nm">
					   <option name="auth_nm" value="" hidden>Select</option>
					   <option name="auth_nm" value="adm_lo_shimla">ADM(L & O) (Shimla)</option>
					</select> 
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">Select Role:</label>
                <div class="controls">
                    <select name="role" id="role" required>
					   <option name="role" value="" hidden>Select</option>
					   <option name="role" value="dist_auth_shimla">District Authority (Shimla)</option>
					</select>&nbsp*   
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">Office Authority Name:</label>
                <div class="controls">
                    <select name="offc_auth" id="offc_auth">
					   <option name="offc_auth" value="" hidden>Select</option>
					   <option name="offc_auth" value="dc_offc_shimla">DC Office (Shimla)</option>
					</select>   
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">Active Status:</label>
                <div class="controls">
                    <input type="radio" id="active_stat" name="active_stat" value="Y"/>  Yes
					<input type="radio" id="active_stat" name="active_stat" value="N" checked="checked"/>  No
                </div>
            </div>
			</fieldset>
            <div class="control-group">
                <div class="controls">
                    <button name="submit" type="submit" class="btn btn-success" onClick="validate()"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
</div>
</body>
</html>
