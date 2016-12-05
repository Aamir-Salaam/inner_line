<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function getval(){
	   var httpxml;
	   try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.add_user_frm.auth_nm.options.length-1;j>=0;j--)
{
document.add_user_frm.auth_nm.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].auth_name;
optn.value = myarray.data[i].auth_code;  // You can change this to subcategory 
document.add_user_frm.auth_nm.options.add(optn);

} 
      }
    } // end of function stateck
	   //////////////////
	   var url="distt_check.php";
       var distt=document.getElementById('district').value;
	   url=url+"?distt="+distt;
       url=url+"&sid="+Math.random();
       httpxml.onreadystatechange=stateck;
	   httpxml.open("GET",url,true);
       httpxml.send(null);
	   ////alert(url);
       ////var distt = sel.value;
	   ////$.post("distt_check.php", { disttvalue: distt } );
	   
	   
getval2();

}

</script>
<!--

-->
<script type="text/javascript">
    function getval2(){
	   var httpxml;
	   try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.add_user_frm.offc_auth.options.length-1;j>=0;j--)
{
document.add_user_frm.offc_auth.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].office_auth_name;
optn.value = myarray.data[i].office_auth_code;  // You can change this to subcategory 
document.add_user_frm.offc_auth.options.add(optn);

} 
      }
    } // end of function stateck
	   //////////////////
	   var url="off_auth_check.php";
       var distt=document.getElementById('district').value;
	   url=url+"?distt="+distt;
       url=url+"&sid="+Math.random();
       httpxml.onreadystatechange=stateck;
	   httpxml.open("GET",url,true);
       httpxml.send(null);
	   ////alert(url);
       ////var distt = sel.value;
	   ////$.post("distt_check.php", { disttvalue: distt } );


}
</script>

<script type="text/javascript">
Webcam.attach( '#my_camera' );
function take_snap(){
Webcam.snap( function(data_uri) {
    var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
    
    document.getElementById('mydata').value = raw_image_data;
    document.getElementById('add_user_frm').submit();
	document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
} );

}
</script>
<script>
function validate(){

var username = document.add_user_frm.username.value;
var password = document.add_user_frm.password.value;
var state_code = document.add_user_frm.state.value;
var distt_code = document.add_user_frm.district.value;
var auth_code = document.add_user_frm.auth_nm.value;
var role_id = document.add_user_frm.role.value;
var office_auth_code = document.add_user_frm.offc_auth.value;
var activeYN = document.add_user_frm.active_stat.value;
if(username==''||password=='' ||state_code=='' ||distt_code=='' ||role_id=='')
alert("Please fill all the * marked fields");
else
   {       if(password.length<6){

            //password.setCustomValidity("Password must contain atleast six characters!!");
			alert("Password must contain atleast six characters!!");

       }
        else{
            var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;  
                 if(password.match(decimal)){   
                    <?php
					     if(isset($_POST['submit'])) {
					     $username = mysql_real_escape_string($_POST['username']);
                         $password = mysql_real_escape_string($_POST['password']);
                         $password = md5($password);
						 $state_code = $_POST['state'];
						 $distt_code = $_POST['district'];
						 $auth_code = $_POST['auth_nm'];
						 $role_id = $_POST['role'];
						 $office_auth_code = $_POST['offc_auth'];
						 $activeYN = $_POST['active_stat'];
						 $user_id = "";
						 $status = "";
						 
						 ///////////////////////
						 mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());
						 
						 $sql3 = mysql_query("SELECT auth_name FROM authority_mas WHERE auth_code = '$auth_code'");
						 while ($row = mysql_fetch_array($sql3)){
						 $authority_name = $row['auth_name'];
						 }
						 $sql4 = mysql_query("SELECT role_name FROM role_mas WHERE role_id = '$role_id'");
						 while ($row = mysql_fetch_array($sql4)){
						 $role = $row['role_name'];
						 }
						 $sql5 = mysql_query("SELECT office_auth_name FROM authority_mas WHERE office_auth_code = '$office_auth_code'");
						 while ($row = mysql_fetch_array($sql5)){
						 $office_auth_name = $row['office_auth_name'];
						 }
						 $sql6 = mysql_query("SELECT user_id FROM users WHERE distt_code = '$distt_code'");
						 $sql_count = mysql_num_rows($sql6);
						 if($sql_count == 0){
						 $str_auth_code = (string)$auth_code;
						 $user_id = $str_auth_code."0"."1";
						 }
						 else{
						 $str_auth_code = (string)$auth_code;
						 $sql_count = $sql_count + 1;
						 $str_sql_count = (string)$sql_count;
						 $user_id = $str_auth_code."0".$str_sql_count;
						 }
						 if($sql_count >=9){
						 $str_auth_code = (string)$auth_code;
						 $sql_count = $sql_count + 1;
						 $str_sql_count = (string)$sql_count;
						 $user_id = $str_auth_code.$str_sql_count;
						 }
						 
						 
						 if($role_id == 1){
						 $status = "Confirmed";
						 
						 }
						 if($role_id == 3){
						 $status = "Pending";
						 
						 }
						 
						 mysql_query("insert into users (user_id,username,password,state_code,distt_code,role_id,role,status,activeYN,office_auth_code,office_auth_name,authority_name,auth_code) values('$user_id','$username','$password','$state_code','$distt_code','$role_id','$role','$status','$activeYN','$office_auth_code','$office_auth_name','$authority_name','$auth_code')")or die(mysql_error());
				   //////////////////////////
				   /////////////////////////
                   ////////////////////////
				   }
				   ?>
				   alert("Submission was Successful !!!");
                      
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
					   <?php 

mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());

$sql = mysql_query("SELECT state_id,state_name FROM state_mas");


while ($row = mysql_fetch_array($sql)){

$s_id = $row['state_id'];
$_SESSION['id'] = $s_id;
$state_code = $_SESSION['id'];

?>
<option name="state" value="<?php echo $row['state_id'];?>" selected="selected" readonly="true"><?php echo $row['state_name']; ?></option>

<?php
// close while loop 
}
?>
					</select>&nbsp*   
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">District:</label>
                <div class="controls">
                    <select name="district" id="district" required onChange="getval()">
					   <option name="district" value="" hidden>Select</option>
					   					   <?php 

mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());

$sql = mysql_query("SELECT distt_id,distt_name FROM district_mas WHERE state_id='$state_code'");

while ($row = mysql_fetch_array($sql)){

?>
<option name="district" value="<?php echo $row['distt_id'];?>"><?php echo $row['distt_name']; ?></option>

<?php
// close while loop 
}
?>
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
<!--
<?php 

////mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());

////$sql = mysql_query("SELECT auth_code,auth_name FROM authority_mas WHERE auth_distt_code='$distt_value'");

////while ($row = mysql_fetch_array($sql)){

?>
<option name="auth_nm" value="<?php //echo $row['auth_code'];?>"><?php //echo $row['auth_name']; ?></option>

<?php
// close while loop 
//}
?>

-->
					</select> 
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">Select Role:</label>
                <div class="controls">
                    <select name="role" id="role" required>
					   <option name="role" value="" hidden>Select</option>
					   <?php 

mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());

$sql = mysql_query("SELECT role_id,role_name FROM role_mas");

while ($row = mysql_fetch_array($sql)){

?>
<option name="role" value="<?php echo $row['role_id'];?>"><?php echo $row['role_name']; ?></option>

<?php
// close while loop 
}
?>
					</select>&nbsp*   
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">Office Authority Name:</label>
                <div class="controls">
                    <select name="offc_auth" id="offc_auth">
					   <option name="offc_auth" value="" hidden>Select</option>
<!--
<?php 

///$distt_value = $_SESSION['distt_value'];
////mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());

////$sql = mysql_query("SELECT office_auth_code,office_auth_name FROM office_mas WHERE distt_id='$distt_value'");

////while ($row = mysql_fetch_array($sql)){

?>
<option name="offc_auth" value="<?php ////echo $row['office_auth_code'];?>"><?php ////echo $row['office_auth_name']; ?></option>

<?php
// close while loop 
////}
?>
-->
					</select>   
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">Active Status:</label>
                <div class="controls">
                    <input type="radio" id="active_stat" name="active_stat" value="Y" checked="checked"/>  Yes
                </div>
            </div>
			<!--
			</fieldset>
			<fieldset>
			<legend>Photograph:</legend>
			<div>
			   <input id="mydata" type="hidden" name="mydata" value=""/>
			</div>
			<div id="my_camera" style="width:320px; height:240px;"></div>
			<div>
			    <button name="capture" type="button" class="btn btn-success" onClick="take_snap()"><i class="icon-save icon-large"></i>Capture</button>
			</div>
			</fieldset>
			-->
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
