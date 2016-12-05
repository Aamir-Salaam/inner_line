<html>
<head>
<title></title>


</head>

<body>

<?php
 
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
                                        <input type="text" name="tour_name" required value="<?php echo $tour_name; ?>" >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label">Nationality:</label>
                                    <div class="controls">
                                        <select name="nationality" required>
										 <option value="<?php echo $nationality; ?>" selected="selected"><?php echo $nationality; ?></option>
				                         <?php include_once("country_list2.txt"); ?>
				                         </select>&nbsp;*
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Passport Number:</label>
                                    <div class="controls">
                                        <input type="text" name="passport_no" required value="<?php echo $passport_no; ?>" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Visa Number:</label>
                                    <div class="controls">
                                        <input type="text" name="visa_no" required value="<?php echo $visa_no; ?>" >
                                    </div>
                                </div>
                             
								 <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;">Save</button>
										<a href="view_permits.php" class="btn">Back</a>
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
                               
									$tour_name_save= $_POST['tour_name'];
									$nationality_save= $_POST['nationality'];
									$passport_no_save= $_POST['passport_no'];
									$visa_no_save= $_POST['visa_no'];
									
								
mysql_query("UPDATE tourist_permit SET tour_name = '$tour_name_save' , nationality = '$nationality_save' , passport_no ='$passport_no_save',
visa_no = '$visa_no_save' WHERE id = '$id'") or die(mysql_error()); 	
?>
<script>
window.location="view_permits.php";
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