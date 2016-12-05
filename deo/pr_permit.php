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
<div>
<div class="row-fluid">
<div></div>
<div>


<div class="hero-unit-3">
<center>

<?php

  $query=mysql_query("select * from tourist_permit where id='$ID'")or die(mysql_error());
 while ($row = mysql_fetch_array($query)) {
						$tour_name = $row['tour_name'];
                        $nationality = $row['nationality'];
                        $passport_no = $row['passport_no'];
						$pass_issue_dt = $row['pass_issue_dt'];
						$pass_expiry_dt = $row['pass_expiry_dt'];
						$visa_no = $row['visa_no'];
						$receipt_no = $row['receipt_no'];
						$amount = $row['receipt_fee'];
						$route_id = $row['route_id'];
						$permit_no = $row['permit_no'];
						$permit_expiry_dt = $row['permit_expiry_dt'];
						$source = "../finalimage/$ID.jpg";
						$t_date = date("d/m/Y");
						$source_def = "../finalimage/default.jpg";
						$img = '<img src="' .$source. '" width="140" height="110" border="0">';
						$img_def = '<img src="' .$source_def. '" width="120" height="60" border="0">';
						if ($route_id == 1){
						       $route_name = "Morang-Pooh-Dubling-Khab-Dhankar-Gompa-Tabo-Kaza";
						}
						else if ($route_id == 2){
						       $route_name = "Triund-Khajiar-Dubling-Dharmkot-Dhankar-Gompa-Tabo-Kaza";
						}
						else{
						       $route_name = "Route Invalid";
						}
                        /* member query  */

                        /* service query  */
                         }
						 
	$query2=mysql_query("select serial_no from receipt_mas where receipt_no='$receipt_no'")or die(mysql_error());
	  while ($row2 = mysql_fetch_array($query2)) {
	                     
						 $serial_no = $row2['serial_no'];
	  
	                     }
                        ?>
 
 
                 
                                
                                <hr>
								<h1 align="center">Permit</h1>
								<h2 align="center">Under para 3 of Foreigners (Protected Area) Order, 1958</h2>
								<hr>
								<form class="form-horizontal" method="post"  enctype="multipart/form-data">
							
							
                                    <p align="left">Permit No. <?php echo $permit_no; ?></p>
                                         
                                        
									
                                    <p align="left">Dated: <?php echo $t_date; ?></p>
                                    
                                      
                                    
                               
							
								
                                    <p align="right">
										<?php echo $img; ?>
									</p>
									
									    
										<!--
                                        <input type="file" name="img" style="margin-left:27px;">
										<button type="submit" name="img" class="btn btn-success" style="margin-top: 20px; margin-right: 131px;">Update</button>
                                    </div>
									-->
							
								<br/>
								<br/>

							
								<div>
								<p>Mr./Mrs./Miss <?php echo $tour_name; ?> national resident of <?php echo $nationality; ?> Passport No. <?php echo $passport_no; ?> date of issue <?php echo $pass_issue_dt; ?> Valid Upto <?php echo $pass_issue_dt; ?> is hereby entitled to enter the protected areas of <?php echo $route_name; ?> and to reside in the protected areas for the purpose of tourism/research.</p>
								<p>He/She shall while residing in the said areas comply with the conditions given below.</p>
								<p>He/She shall not remian in the said areas after <?php echo $permit_expiry_dt; ?> unless he/she has obtained the prior permission of the authority who issued the permit. Application for any extension must be given at least three days before its expiry.</p>
								</div>
                                <br/>
								<br/>
								<br/>
								<div align="left">
								<p>Endst. No As Above</p>
								<br/>
								<p>Copy Forwarded to :-</p>
								<br/>
								<p>1.The District Magistrate, Kinnaur at Reckong Peo, Lahaul Spiti at Keylong.</p>
								<p>2.The Superintendent of Police, Shimla, Kinnaur at Reckong Peo, Lahaul Spiti at Keylong.</p>
								<p>3.The Central Intelligence Officer(SIB) Dormal Building, Shimla.</p>
								<p>4.Individual Concerned.</p>
								</div>
								<div align="right">
                                  <p>Additional District Magistrate (L & O)</p>
								  <p>Shimla, Distt. Shimla(H.P.)</p>
                                    </div>
                                                         
								 <div class="control-group">
								 
								 <div><label>Do you want to print the Permit?</label></div><br/>
								 
                                    <div class="controls">
                                       
                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;" onClick="window.print();return false">Yes</button>
										<a href="print_permit.php" class="btn">No</a>
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
                               
							///////////
							/*
							generate pdf here
							
							*/
							//////////	
?>
<script>
window.location="reprint_receipt.php";
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