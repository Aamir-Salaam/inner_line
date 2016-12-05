<?php include('header.php'); ?>
<?php include('session.php'); ?>
<div class="container">

    <div class="row">	
        <div class="span3">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="span9">
            <?php include("toplogo.php"); ?>
            <?php include('navbar_dasboard.php') ?>
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Schedule Table</strong>
            </div>
            <!-- form sort -->
            <form method="POST" action="sort_date.php">
                <input type="text"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
                <br>
                <button name="sort"  class="btn btn-success"><i class="icon-filter icon-large"></i>&nbsp;Sort</button>
                <br>
                <br>
            </form>
            <!-- end form -->
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>
                        <th>Number</th>
						<th style="text-align:center">Image</th>
                        <th>Name</th>
                        <th>Nationality</th>
						<!--                                 
                        <th>Passport No.</th>                                 
                        <th>Visa No.</th>
						-->
						<th>Status</th> 
						<th>Permit No.</th>                                
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $user_query = mysql_query("select * from tourist_permit")or die(mysql_error());
                    while ($row = mysql_fetch_array($user_query)) {
                        $id = $row['id'];
						$tour_name = $row['tour_name'];
                        $nationality = $row['nationality'];
                        $passport_no = $row['passport_no'];
						$visa_no = $row['visa_no'];
						$status = $row['status'];
						$permit_no = $row['permit_no'];
						$source = "../finalimage/$id.jpg";
						$source_def = "../finalimage/default.jpg";
						$img = '<img src="' .$source. '" width="120" height="60" border="0">';
						$img_def = '<img src="' .$source_def. '" width="120" height="60" border="0">';
                        /* member query  */

                        /* service query  */

                        ?>

                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $img; ?></td>
                            <td><?php echo $row['tour_name']; ?></td> 
                            <td><?php echo $row['nationality']; ?></td> 
							<!--
                            <td><?php //echo $row['passport_no']; ?></td> 
                            <td><?php //echo $row['visa_no']; ?></td>
							-->
							<td><?php echo $row['status']; ?></td>  
							<td><?php echo $row['permit_no']; ?></td>
                            <td style="text-align:center">

                                
                                    
                                
                                <a href="edit.php<?php echo '?id='.$id; ?>" title="Edit" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                <a  href="approve_permit.php<?php echo '?id=' . $id; ?>" title="Approve" class="btn btn-info"><i class="icon-check icon-large"></i></a>
								<a href="reject_permit.php<?php echo '?id='.$id; ?>" title="Reject" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                  <?php //include('delete_schedule.php'); ?> 
								  
                            <?php //include('edit_service.php'); ?>
                            </td>
                        <?php //include('toolttip_edit_delete.php'); ?>
                        </tr>
<?php } ?>

                </tbody>
            </table>



        </div>
    </div>
<?php include('footer.php') ?>