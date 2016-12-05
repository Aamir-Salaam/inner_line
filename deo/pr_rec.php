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
						$visa_no = $row['visa_no'];
						$receipt_no = $row['receipt_no'];
						$amount = $row['receipt_fee'];
						$route_id = $row['route_id'];
						$source = "../finalimage/$ID.jpg";
						$t_date = date("d/m/Y");
						$source_def = "../finalimage/default.jpg";
						$img = '<img src="' .$source. '" width="140" height="110" border="0">';
						$img_def = '<img src="' .$source_def. '" width="120" height="60" border="0">';
                        /* member query  */

                        /* service query  */
                         }
						 
	$query2=mysql_query("select serial_no from receipt_mas where receipt_no='$receipt_no'")or die(mysql_error());
	  while ($row2 = mysql_fetch_array($query2)) {
	                     
						 $serial_no = $row2['serial_no'];
	  
	                     }
                        ?>
 
 <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                 <table border="0" align="center">
				 <tr>
				 <td>
                                
                                <hr>
								<h4 align="center">Receipt (Tourist Permit)</h4>
								<hr>
								<div class="control-group">
                                    <label class="control-label">
										Photograph:
									</label>
									
                                    <div class="controls">
									    <?php echo $img; ?>
										<!--
                                        <input type="file" name="img" style="margin-left:27px;">
										<button type="submit" name="img" class="btn btn-success" style="margin-top: 20px; margin-right: 131px;">Update</button>
                                    </div>
									-->
									</div>
                                </div>
								</td>
								</tr>
								</table>
								 <table border="0" align="center">

								<tr height="20px">
								</tr>                                
                                
								<tr>
								<td>
								<div class="control-group">
                                    <label class="control-label">Serial Number:</label>
                                    <div class="controls">
                                        <input type="text" name="serial_no" required value="<?php echo $serial_no; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								<td>
								<div class="control-group">
                                    <label class="control-label">Receipt Number:</label>
                                    <div class="controls">
                                        <input type="text" name="receipt_no" required value="<?php echo $receipt_no; ?>" readonly="true" >
                                    </div>
                                </div>
								
								</td>
								</tr>
								<tr height="20px">
								</tr>
								<tr>
								<td>
								<div class="control-group">
                                    <label class="control-label">Date Today:</label>
                                    <div class="controls">
                                        <input type="text" name="t_date" required value="<?php echo $t_date; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								</tr>
								<tr height="20px">
								</tr>
								<tr>
								<td>
								<div class="control-group">
                                    <label class="control-label">Tourist Name:</label>
                                    <div class="controls">
                                        <input type="text" name="tour_name" required value="<?php echo $tour_name; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								<td>
								<div class="control-group">
                                    <label class="control-label">Nationality:</label>
                                    <div class="controls">
                                        <input type="text" name="nationality" required value="<?php echo $nationality; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								</tr>
								<tr height="20px">
								</tr>
								<tr>
								<td>
                                <div class="control-group">
                                    <label class="control-label">Passport Number:</label>
                                    <div class="controls">
                                        <input type="text" name="passport_no" required value="<?php echo $passport_no; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								<td>
                                <div class="control-group">
                                    <label class="control-label">Visa Number:</label>
                                    <div class="controls">
                                        <input type="text" name="visa_no" required value="<?php echo $visa_no; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								</tr>
								<tr height="20px">
								</tr>
								<tr>
								<td>
								<div class="control-group">
                                    <label class="control-label">Route Id:</label>
                                    <div class="controls">
                                        <input type="text" name="route_id" required value="<?php echo $route_id; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								</tr>
								<tr height="20px">
								</tr>
								<tr>
								<td>
								<div class="control-group">
                                    <label class="control-label">Amount:</label>
                                    <div class="controls">
                                        <input type="text" name="amount" required value="<?php echo $amount; ?>" readonly="true" >
                                    </div>
                                </div>
								</td>
								</tr>
								<tr height="20px">
								</tr>
								<tr>
								<td>
								</td>
								<td>
								</td>
								<td>
								<p>Sign.</p>
								</td>
								</tr>
								<tr height="20px">
								</tr>
								<tr>
								</table>

							    
                             
								 <div class="control-group">
								 
								 <div><label>Do you want to print the Receipt?</label></div><br/>
								 
                                    <div class="controls">
                                       
                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;" onClick="window.print();return false">Yes</button>
										<a href="reprint_receipt.php" class="btn">No</a>
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