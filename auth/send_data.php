<?php
                        
					     
                         $username = mysql_real_escape_string($_POST['username']);
                         $password = mysql_real_escape_string($_POST['password']);
                         $password = md5($password+"Aamir");
						 $state_code = $_POST['state_code'];
						 $distt_code = $_POST['distt_code'];
						 $auth_code = $_POST['auth_code'];
						 $role_id = $_POST['role_id'];
						 $office_auth_code = $_POST['office_auth_code'];
						 $activeYN = $_POST['activeYN'];
						 ///////////////////////
						 mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());
						 
						 ////$sql1 = mysql_query("SELECT state_name FROM state_mas WHERE state_id = '$state_code'");
						 ////while ($row = mysql_fetch_array($sql1)){
						 ////$state_name = $row['state_name'];
						 ////}
						 ////$sql2 = mysql_query("SELECT distt_name FROM distt_mas WHERE distt_id = '$distt_code'");
						 ////while ($row = mysql_fetch_array($sql2)){
						 ////$distt_name = $row['distt_name'];
						 ////}
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
						  
						 ///////////////////////
						 //////////////////////
					       $dbhost_name = "localhost"; // Your host name 
                           $database = "inner_line_permit";       // Your database name
                           $usernm = "root";    
                           $pdo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $usernm);

						   ////$dbo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						   /////$commandSQL = 'CALL register_user_2($username,$password,$district,$active_stat,$role,$state,$auth_name,$role_name,$auth_nm,$office_auth_name,$offc_auth,@login_id,@message)';
						   
						   try{
						        $pdo->query("CALL register_user_2($username,$password,$distt_code,$activeYN,$role_id,$state_code,$authority_name,$role,$auth_code,@login_id,$office_auth_name,$office_auth_code,@message)");
						   }
						   catch(PDOException $e){
						        print $e->getMessage() . "<br/>";
								print "Error.......";
								die();
						   }
					      /////////////////////
						 //////////////////////
                      /////mysql_query("insert into users (username,password,state_code,distt_code,role_id,role,activeYN,office_auth_code,office_auth_name,authority_name,auth_code) values('$username','$password','$state','$district','$role','$role_name','$active_stat','$offc_auth','$office_auth_name','$auth_name','$auth_nm')")or die(mysql_error());
					   
                       
                   ?>