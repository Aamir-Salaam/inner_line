
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<html>
<head>
<script type="text/javascript" src="webcam.min.js"></script>

<script type="text/javascript">

function validate(){

var tour_nm = document.tour_form.tour_nm.value;
var tour_fath_nm = document.tour_form.tour_fath_nm.value;
var tour_dob = document.tour_form.tour_dob.value;
var tour_prof = document.tour_form.tour_prof.value;
var country = document.tour_form.tour_contr.value;
var tour_addr = document.tour_form.tour_addr.value;
var tour_passno = document.tour_form.tour_passno.value;
var tour_pass_issue = document.tour_form.tour_pass_issue.value;
var tour_pass_valid = document.tour_form.tour_pass_valid.value;
var tour_visano = document.tour_form.tour_visano.value;
var tour_visa_issue = document.tour_form.tour_visa_issue.value;
var tour_visa_valid = document.tour_form.tour_visa_valid.value;
var route_id = document.tour_form.route_id.value;
var tour_permit_issue = document.tour_form.tour_permit_issue.value;
var tour_permit_valid = document.tour_form.tour_permit_valid.value;
if(tour_nm==''||tour_fath_nm=='' ||tour_dob=='' ||tour_prof=='' ||country=='' ||tour_addr=='' ||country=='' ||tour_passno=='' ||tour_pass_issue=='' ||tour_pass_valid=='' ||tour_visano=='' ||tour_visa_issue=='' ||tour_visa_valid=='' ||route_id=='' ||tour_permit_issue=='' ||tour_permit_valid=='')
alert("Please fill all the * marked fields!!");
else
    {
      <?php
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
				   mysql_select_db('inner_line_permit',mysql_connect('localhost','root',''))or die(mysql_error());
				   
				   mysql_query("insert into tourist_permit(tour_name,fath_hus_nm,dob,profession,nationality,permanent_addr,passport_no,pass_issue_dt,pass_expiry_dt,visa_no,visa_issue_dt,visa_expiry_dt,route_id,permit_issue_dt,permit_expiry_dt) values('$tour_nm','$tour_fath_nm','$tour_dob','$tour_prof','$country','$tour_addr','$tour_passno','$tour_pass_issue','$tour_pass_valid','$tour_visano','$tour_visa_issue','$tour_visa_valid','$route_id','$tour_permit_issue','$tour_permit_valid')")or die(mysql_error());
			    
				 
			    }
			?>
	    alert("Submission Successful !!");
	    

    }

}
</script>
</head>
<body>
<div class="container">

    <div class="row">	
        <div class="span3">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="span9">
            <img src="../img/dr.jpg" class="img-rounded">
            <?php include('navbar_dasboard.php') ?>
            <?php //include('add_note.php'); ?>
			<div>
			<fieldset>
			<legend>Photograph:</legend>
              
<div id="my_camera"></div>
 
    <!-- A button for taking snaps -->
 
<form>
        <input type="button" class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
</form>

			<div id="results" class="well">Your captured image will appear here...</div>
 
    <!-- First, include the Webcam.js JavaScript Library -->
    <script type="text/javascript" src="webcam.min.js"></script>
     
    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
        function take_snapshot() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                document.getElementById('results').innerHTML = '<h2>Here is your image:</h2>' + '<img src="'+data_uri+'"/>';
            Webcam.upload( data_uri, 'upload.php', function(code, text) {
                                            // Upload complete!
                                            // 'code' will be the HTTP response code from the server, e.g. 200
                                            // 'text' will be the raw response content
                                });
            } );
        }
    </script>
			</fieldset>
			</div>
			<form method="post" name="tour_form">
			<div>
			<fieldset>
			<legend>Personal Information:</legend>
			<table border="0">
			  <tr>
			      <td><label>Full Name: </label></td>
			      <td><input type="text" name="tour_nm" maxlength="100" placeholder="Enter your full name" required/>&nbsp;*</td>
				  <td style="padding-left:80px"> </td>
				  <td><label>Father's/Husband's Name: </label></td>
				  <td><input type="text" name="tour_fath_nm" maxlength="100" placeholder="Enter father's/husband's name" required/>&nbsp;*</td>
			  </tr>
			   <tr>
			      <td><label>Date of Birth: </label></td>
			      <td><input type="date" name="tour_dob" maxlength="100" required/></td>
				  <td style="padding-left:80px"> </td>
				  <td style="text-align:right"><label>Profession:  </label></td>
				  <td><input type="text" name="tour_prof" maxlength="100" placeholder="Enter your profession" required/>&nbsp;*</td>
			  </tr>
			   <tr>
			      <td><label>Nationality: </label></td>
			      <td><select name="tour_contr" required>
				    <?php include_once("country_list.txt"); ?>
				  </select>&nbsp;*
				  </td>
				  <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			  </tr>
			  <tr>
				  <td><label>Permanent Address:  </label></td>
				  <td><textarea name="tour_addr" maxlength="250" style="width:220px;height:60px;padding:5px;" required></textarea>&nbsp;*</td>
				  <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			  </tr>
			</table>
			</fieldset>
			</div>
			<br/>
			<br/>
			<div>
			<fieldset>
			<legend>Travel Information:</legend>
			<table border="0">
			  <tr>
			      <td><label>Passport Number: </label></td>
			      <td><input type="text" name="tour_passno" maxlength="100" placeholder="Enter passport number" required/>&nbsp;*</td>
			      <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			 </tr>
			 <tr>	  
				  <td><label>Issue date: </label></td>
				  <td><input type="date" name="tour_pass_issue" maxlength="100" required/>&nbsp;*</td>
				  <td style="padding-left:80px"> </td>
				  <td><label>Valid Upto: </label></td>
				  <td><input type="date" name="tour_pass_valid" maxlength="100" required/>&nbsp;*</td>
			  </tr>
			  <tr style="height:25px">
			      <td></td>
				  <td></td>
				  <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			  </tr>
			   <tr>
			      <td><label>Visa Number: </label></td>
			      <td><input type="text" name="tour_visano" maxlength="100" placeholder="Enter visa number" required/>&nbsp;*</td>
				  <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			   </tr>
			   <tr>
				  <td><label>Issue date: </label></td>
				  <td><input type="date" name="tour_visa_issue" maxlength="100" required/>&nbsp;*</td>
				  <td style="padding-left:80px"> </td>
				  <td style="text-align:right"><label>Valid Upto:  </label></td>
				  <td><input type="date" name="tour_visa_valid" maxlength="100" required/>&nbsp;*</td>
			  </tr>
			  <tr style="height:25px">
			      <td></td>
				  <td></td>
				  <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			  </tr>
			   <tr>
			      <td><label>Name of Sponsoring Agency: </label></td>
			      <td><input type="text" name="tour_spon_agency" maxlength="100" placeholder="Enter sponsoring agency name"/></td>
				  <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			  </tr>
			</table>
			</fieldset>
			</div>
			<br/>
			<br/>
			<div>
			<fieldset>
			<legend>Travel and Background Details:</legend>
			<table border="0">
			<tr>
			<td><label>Specific Place where to be visited notified area:</label></td>
			<td><textarea name="tour_visit_place" maxlength="500" style="width:450px; height:30px"></textarea></td>
			</tr>
			<tr>
			<td><label>Purpose of visit and duration of stay in the notified area:</label></td>
			<td><textarea name="tour_visit_purpose" maxlength="500" style="width:450px; height:30px"></textarea></td>
			</tr>
			<tr>
			<td><label>Have you ever visited area previously?</label></td>
			<td><textarea name="tour_visit_prev" maxlength="500" style="width:450px; height:30px"></textarea></td>
			</tr>
			<tr>
			<td><label>Have you ever been convicted of any offence in the country?</label></td>
			<td><textarea name="tour_offence_hist" maxlength="500" style="width:450px; height:30px"></textarea></td>
			</tr>
			</table>
			</fieldset>
			</div>
			<br/>
			<br/>
						<div>
			<fieldset>
			<legend>Permit Details:</legend>
			<table border="0">
			  <tr>
			      <td><label>Route : </label></td>
			      <td><select name ="route_id" required>
				      <option value="" disabled="disabled" selected="selected" hidden>Select a Route ...</option>
				      <option value="1">Route 1</option>
					  <option value="2">Route 2</option>
				  </select>&nbsp;*
				  </td>
			      <td style="padding-left:80px"> </td>
				  <td></td>
				  <td></td>
			 </tr>
			 <tr>	  
				  <td><label>Permit Issue date: </label></td>
				  <td><input type="date" name="tour_permit_issue" maxlength="100" required/>&nbsp;*</td>
				  <td style="padding-left:80px"> </td>
				  <td><label>Valid Upto: </label></td>
				  <td><input type="date" name="tour_permit_valid" maxlength="100" required/>&nbsp;*</td>
			  </tr>
			</table>
			</fieldset>
			</div>
			<br/>
			<br/>
			<br/>
			<div>
			<table border="0">
			<tr>
			<td></td>
			<td></td>
			<td style="padding-left:300px">
			<input value="Submit" id="submit" name="submit" type="submit" class="btn btn-success" onClick="validate()"/>     
			</td>
			<td></td>
			<td></td>
			</tr>
			</table>
			</div>
			</form>
			<br/>
			<br/>
			<br/>
			<br/>
			<!--
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>
                        <th>Message</th>                                 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
					/*
                    $user_query = mysql_query("select * from note")or die(mysql_error());
                    while ($row = mysql_fetch_array($user_query)) {
                        $id = $row['note_id'];
                        ?>
                        <tr class="del<?php echo $id ?>">

                            <td><?php echo $row['message']; ?></td> 
                            <td width="100">
                                <a href="#delete<?php echo $id ?>" data-toggle="modal"  rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                <?php include('delete_note_modal.php'); ?>
                                <a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    <?php include('edit_note.php'); ?>
                            </td>
                            <?php include('toolttip_edit_delete.php'); ?>
                        </tr>
                    <?php } */?>

                </tbody>
            </table>

          -->

        </div>
    </div>
	</div>
</body>
</html>
    <?php include('footer.php') ?>