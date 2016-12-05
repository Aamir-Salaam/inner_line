<html>
<head>
<title></title>


</head>

<body>

<?php
include('session.php'); 
include('header.php'); 
$ID=$_GET['id'];

?>



<div class="container">
<div class="hero-unit-header">
 <div class="container-con">
<!-- end banner & menunav -->

<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="row-fluid">
<div class="span3"></div>
<div class="span6">


<div class="hero-unit-3">
<center>

<?php

  $query=mysql_query("select * from tourist_permit where id='$ID'")or die(mysql_error());
 while ($row = mysql_fetch_array($query)) {
						$tour_name = $row['tour_name'];
                        $nationality = $row['nationality'];
                        $passport_no = $row['passport_no'];
						$visa_no = $row['visa_no'];
						$source = "../finalimage/$ID.jpg";
						$source_def = "../finalimage/default.jpg";
						$img = '<img src="' .$source. '" width="120" height="60" border="0">';
						$img_def = '<img src="' .$source_def. '" width="120" height="60" border="0">';
                        /* member query  */

                        /* service query  */
                         }
						 
                        ?>
 
 <form class="form-horizontal" method="post"  enctype="multipart/form-data" style="float: right;">
                                <legend><h4>Edit</h4></legend>
								<div><?php echo $_SESSION['u_id']; ?></div>
                                <h4>Image</h4>
                                <hr>
								<div class="control-group">
                                    <label class="control-label">
										Photograph:
									</label>
									
                                    <div class="controls" style="margin-right:171px">
									    <?php echo $img; ?>
										<!--
                                        <input type="file" name="img" style="margin-left:27px;">
										<button type="submit" name="img" class="btn btn-success" style="margin-top: 20px; margin-right: 131px;">Update</button>
                                    </div>
									-->
                                </div>
                                <hr>
                                <h4>Personal Information</h4>
                                <hr>
								<div class="control-group">
                                    <label class="control-label">Tourist Name:</label>
                                    <div class="controls">
                                        <input type="text" name="tour_name" required value="<?php echo $tour_name; ?>" readonly="true" >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label">Nationality:</label>
                                    <div class="controls">
                                        <input type="text" name="nationality" required value="<?php echo $nationality; ?>" readonly="true" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Passport Number:</label>
                                    <div class="controls">
                                        <input type="text" name="passport_no" required value="<?php echo $passport_no; ?>" readonly="true" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Visa Number:</label>
                                    <div class="controls">
                                        <input type="text" name="visa_no" required value="<?php echo $visa_no; ?>" readonly="true" >
                                    </div>
                                </div>
								
								<div class="control-group">
                                    <label class="control-label">Enter Amount:</label>
                                    <div class="controls">
                                        <input type="number" name="amount" required>
                                    </div>
                                </div>

							
                             
								 <div class="control-group">
								 
								 <div><label>Do you want to generate the Receipt?</label></div><br/>
								 
                                    <div class="controls">
                                       
                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;">Yes</button>
										<a href="generate_receipt.php" class="btn">No</a>
                                    </div>
                                </div>
                            </form>
							
							
<?php
/*
$id=$_REQUEST['id'];
if (isset($_POST['img'])) {

//image
							$image = $_FILES["img"] ["name"];
							$image_name= addslashes($_FILES['img']['name']);
							$size = $_FILES["img"] ["size"];

move_uploaded_file($_FILES["img"]["tmp_name"],"upload/" . $_FILES["img"]["name"]);			
$location=$_FILES["img"]["name"];

mysql_query(" UPDATE student SET location='$location' WHERE student_id = '$id' ")or die(mysql_error());
header('location:schedule.php');
}
*/
?>
							
							<?php
							
							
							$id=$_REQUEST['id'];

$result = mysql_query("SELECT * FROM tourist_permit WHERE id = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		        
									$tour_name= $test['tour_name'];
									$nationality= $test['nationality'];
									$passport_no= $test['passport_no'];
									$visa_no= $test['visa_no'];
									
				
				
                            
if (isset($_POST['update'])) {
                               
									$receipt_status = "Y";
									$amount = $_POST['amount'];
									$receipt_gen_dt = date("Y-m-d");
									$year = date("Y");
									$u_id = $_SESSION['u_id'];
									$result2 = mysql_query("select * from users where user_id='$u_id'")or die(mysql_error());
									while ($row2 = mysql_fetch_array($result2)) {
									$distt_code = $row2['distt_code'];
									}
									$str_distt_code = (string)$distt_code;
									$str_id = (string)$id;
									
									if($str_distt_code === '09'){
									
									$receipt_no = $str_id."/Sml/".$year;
									
									}
									else if($str_distt_code === '01'){
									
									$receipt_no = $str_id."/Kin/".$year;
									
									}
mysql_query("insert into receipt_mas(receipt_no,receipt_gen_dt,receipt_status,amount) values('$receipt_no','$receipt_gen_dt','$receipt_status','$amount')") or die(mysql_error());
								
mysql_query("UPDATE tourist_permit SET receipt_status = '$receipt_status' , receipt_no = '$receipt_no', receipt_fee = '$amount' WHERE id = '$id'") or die(mysql_error()); 	
?>
<script>
window.location="generate_receipt.php";
</script>

<?php

					
								} 
								
								?>
								
								</center>
								</center>

								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>

</body>
</html>