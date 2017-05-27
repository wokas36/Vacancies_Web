<?php
function read_employees(){
	
	$read_employee = mysql_query("select * from applicant");
	$employee_count=mysql_num_rows($read_employee);
	
	$privilege=$_SESSION['privilege'];
	?>
    <header class="content_header">
    <h2>Applicants</h2>
    </header>
    <?php
	if($employee_count > 0){
		?>
		<table class="datatable table table-striped table-bordered table-hover" id="example">
			<thead>
				<tr>
					<th style="width:10%;">Image</th>
					<th style="width:10%;">Applicant name</th>
					<th style="width:20%;">Address</th>
					<th style="width:10%;">Phone No</th>
					<th style="width:20%;">Email</th>
					<th style="width:10%;">Registration Date</th>
					<th style="width:10%;">Job Description</th>
					<th style="width:10%;">View/Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while($rows_employee = mysql_fetch_array($read_employee)) {
					$employee_id = $rows_employee['employee_id'];
					$job_description = $rows_employee['job_description'];
					$user_details = mysql_query("select * from users where user_id='$employee_id'");
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
						<td style="text-align:center;"><?php echo $job_description; ?></td>
						<td class="toolbar">
							<div class="btn-group" style="text-align: center;">
								<a href="./?option=view_employee_profile&employee_id=<?php echo $employee_id; ?>" title="Click here to view this employee">
								<button class="btn btn-flat" title="View"><span class="icon-eye-open"></span></button></a>
								<?php 
								if($privilege == 'Administrator') {
									?>
									<a href="./?option=employee_update_form&employee_id=<?php echo $employee_id; ?>" title="Click here to edit this employee">
									<button class="btn btn-flat" title="Edit"><span class="icon-edit"></span></button></a>
									
									<a href="javascript:;" title="Click here to remove this employee" onclick="return employeeRemoveConfirmation('<?php echo $employee_id; ?>', '<?php echo $fullname; ?>');">
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
		function employeeRemove(employee_id){
			window.location ='./process_functions/process_functions.php?action=employee_remove&employee_id='+employee_id
		}

		function employeeRemoveConfirmation(employee_id, employee_name){
	
			$remove_link='<a href="javascript:" onclick="employeeRemove('+employee_id+')">Confirm '+employee_name+' remove.</a>';
	
			$.jGrowl("Are you sure you want remove "+employee_name+"? If yes then click below link to confirm it.<br/><br/>"+$remove_link, {theme: 'warning',	beforeClose: function() { return false;}});
		}
		</script>
		
		<?php
	}
	else{
		echo "There are no employees currently";
	}
}
?>