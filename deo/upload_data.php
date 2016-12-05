      <?php
	  session_start();
	       if(isset($_POST['submit'])){
			
			       $tour_nm = $_POST['tour_nm'];
				   $tour_fath_nm = $_POST['tour_fath_nm'];
				   $tour_dob = date("Y-m-d", strtotime($_POST['tour_dob']));
				   $tour_prof = $_POST['tour_prof'];
				   $country = $_POST['tour_contr'];
				   $tour_addr = $_POST['tour_addr'];
				   $tour_passno = $_POST['tour_passno'];
				   $tour_pass_issue = date("Y-m-d", strtotime($_POST['tour_pass_issue']));
				   $tour_pass_valid = date("Y-m-d", strtotime($_POST['tour_pass_valid']));
				   $tour_visano = $_POST['tour_visano'];
				   $tour_visa_issue = date("Y-m-d", strtotime($_POST['tour_visa_issue']));
				   $tour_visa_valid = date("Y-m-d", strtotime($_POST['tour_visa_valid']));
				   $route_id = $_POST['route_id'];
				   $tour_permit_issue = date("Y-m-d", strtotime($_POST['tour_permit_issue']));
				   $tour_permit_valid = date("Y-m-d", strtotime($_POST['tour_permit_valid']));
				   ///$permit_no = rand(100,999);
				   ///$receipt_no = rand(1,99);
				   //////////////////////////
				   if (is_uploaded_file($_FILES['fileField']['tmp_name']) && $_FILES['fileField']['error']==0){
				   $newname = ".jpg";
				   mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());
				   mysql_query("insert into tourist_permit(tour_name,fath_hus_nm,dob,profession,nationality,permanent_addr,passport_no,pass_issue_dt,pass_expiry_dt,visa_no,visa_issue_dt,visa_expiry_dt,route_id,permit_issue_dt,permit_expiry_dt) values('$tour_nm','$tour_fath_nm','$tour_dob','$tour_prof','$country','$tour_addr','$tour_passno','$tour_pass_issue','$tour_pass_valid','$tour_visano','$tour_visa_issue','$tour_visa_valid','$route_id','$tour_permit_issue','$tour_permit_valid')")or die(mysql_error());
			    $photo_id = mysql_insert_id();
		        move_uploaded_file($_FILES['fileField']['tmp_name'],"../finalimage/$photo_id".$newname);
				 
			        } 
				}
				header("location: note.php");
				exit();
			?>