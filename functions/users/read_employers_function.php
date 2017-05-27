<?php
function read_investigators(){
	
	$read_investigator = mysql_query("select * from employer");
	$investigator_count = mysql_num_rows($read_investigator);
	
	$privilege=$_SESSION['privilege'];
	?>
    <header class="content_header">
    <h2>Employers</h2>
    </header>
    <?php
	if($investigator_count > 0){
		?>
		<table class="datatable table table-striped table-bordered table-hover" id="example">
			<thead>
				<tr>
					<th style="width:10%;">Image</th>
					<th style="width:10%;">Employer name</th>
					<th style="width:20%;">Address</th>
					<th style="width:10%;">Phone No</th>
					<th style="width:20%;">Email</th>
					<th style="width:10%;">Registration Date</th>
					<th style="width:10%;">Experiance</th>
					<th style="width:10%;">View/Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while($rows_investigator = mysql_fetch_array($read_investigator)) {
					$investigator_id = $rows_investigator['investigator_id'];
					$experiance = $rows_investigator['experiance'];
					$user_details = mysql_query("select * from users where user_id='$investigator_id'");
					$row = mysql_fetch_assoc($user_details);
					$profile_img = $row['profile_img'];
					$fname = $row['first_name'];
					$lname = $row['last_name'];
					$fullname = $fname." ".$lname;
					$address = $row['address'];
					$phone_no = $row['phone_no'];
					$email = $row['email'];
					$registration_date = $row['registration_date'];
					?><tr>
						<td>
							<center>
							<?php if(!empty($profile_img)) {?>
						
									<div id="rowtitle"><image src="uploads/user_images/thumbs_60/<?php echo $profile_img; ?>" /></div>
							<?php
								}
								else{
							?>
									<div id="rowtitle"><image src="uploads/default_user_image/default.jpeg" /></div>
							<?php
								}
							?>
							</center>
						</td>
						<td>
							<?php echo $fullname; ?> <br>
						</td>
						<td><?php echo $address; ?></td>
						<td style="text-align:center;"><?php echo $phone_no; ?></td>
						<td style="text-align:center;"><?php echo $email; ?></td>
						<td style="text-align:center;"><?php echo $registration_date; ?></td>
						<td style="text-align:center;"><?php echo $experiance; ?></td>
						<td class="toolbar">
							<div class="btn-group" style="text-align: center;">
								<a href="./?option=view_investigator_profile&investigator_id=<?php echo $investigator_id; ?>" title="Click here to view this investigator">
								<button class="btn btn-flat" title="View Investigator"><span class="icon-eye-open"></span></button></a>
								
								<?php 
								if($privilege == 'Administrator') {
									?>
									<a href="./?option=investigator_update_form&investigator_id=<?php echo $investigator_id; ?>" title="Click here to edit this investigator">
									<button class="btn btn-flat" title="Edit Investigator"><span class="icon-edit"></span></button></a>
									
									<a href="javascript:;" title="Click here to remove this investigator" onclick="return investigatorRemoveConfirmation('<?php echo $investigator_id; ?>', '<?php echo $fullname; ?>');">
									<button class="btn btn-flat" title="Delete"><span class="icon-trash"></span></button></a>
									<?php
								}
								?>
								
							</div>	
						</td>
					</tr><?php
				}
				?>
			</tbody>
		</table>
		
		<script language="javascript" type="text/javascript">
		function investigatorRemove(investigator_id){
			window.location ='./process_functions/process_functions.php?action=investigator_remove&investigator_id='+investigator_id
		}

		function investigatorRemoveConfirmation(investigator_id, investigator_name){
	
			$remove_link='<a href="javascript:" onclick="investigatorRemove('+investigator_id+')">Confirm '+investigator_name+' remove.</a>';
	
			$.jGrowl("Are you sure you want remove "+investigator_name+"? If yes then click below link to confirm it.<br/><br/>"+$remove_link, {theme: 'warning',	beforeClose: function() { return false;}});
		}
		</script>
		
		<?php
	}
	else{
		echo "There are no investigators currently";
	}
}
?>