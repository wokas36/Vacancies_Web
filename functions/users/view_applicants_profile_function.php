<?php
function view_employee_profile(){
	$employee_table = "applicant";
	$users_table = "users";
	$employee_id=mysql_real_escape_string($_GET['employee_id']);
	
	$read_employee=mysql_query("select * from $employee_table where employee_id='$employee_id'");
	$rows_employee=mysql_fetch_array($read_employee);
	
	$read_user = mysql_query("select * from $users_table where user_id='$employee_id'");
	$rows_user = mysql_fetch_array($read_user);
	
	$employee_name = $rows_user['first_name']." ".$rows_user['last_name'];
	$address = $rows_user['address'];
	$phone_no = $rows_user['phone_no'];
	$profile_img = $rows_user['profile_img'];
	$email = $rows_user['email'];
	$registration_date = $rows_user['registration_date'];
	$priviledge=$rows_user['privilege'];
	
	$nic_no=$rows_employee['nic_no'];
	$epf_no=$rows_employee['epf_no'];
	$job_description=$rows_employee['job_description'];
	
	if(mysql_num_rows($read_user) > 0) {
	?>
    <header class="content_header">
    <h2>Applicant Profile</h2>
    </header>
    
    <div id="accordionName" class="accordion">
        <div class="accordion-group">
            <div class="accordion-heading">
            <a class="accordion-toggle collapsed" href="#accordionTabOne" data-parent="#accordionName" data-toggle="collapse">Complete Employee Details</a>
            </div>
            <div id="accordionTabOne" class="accordion-body collapse">
                <div class="accordion-inner">
				
					 <div class="span1">
					 <?php if(!empty($profile_img)) {?>
						<image src="uploads/user_images/thumbs_60/<?php echo $profile_img; ?>"/>
						<?php
						}
						else{
						?>
							<image src="uploads/default_user_image/default.jpeg"/>
						<?php
						}
						?>
					 </div>
                
                    <div class="span5">
						<h6><span class="label_title">Applicant Name &nbsp;:</span> <?php echo $employee_name; ?></h6>
                        <h6><span class="label_title">Address :</span> <?php echo $address; ?></h6>
                        <h6><span class="label_title">Phone no :</span> <?php echo $phone_no; ?></h6>
                        <h6><span class="label_title">E-mail : </span><?php echo $email; ?></a></h6>
                        <div class="clear"></div>
                    </div>
                    <div class="span5">
						<h6><span class="label_title">Registration Date :</span><?php echo $registration_date; ?></h6>
						<h6><span class="label_title">NIC :</span> <?php echo $nic_no; ?></h6>
						<h6><span class="label_title">EPF No :</span> <?php echo $epf_no; ?></h6>
						<h6><span class="label_title">Job Description :</span> <?php echo $job_description; ?></h6>
                        <h6><span class="label_title">Priviledge  :</span> <?php echo $priviledge; ?></h6>						
                        <div class="clear"></div>
                    </div>
                  	<div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
	} else {
		echo '
		<script language="javascript" type="text/javascript">
			history.go(-1);
		</script>
		';
	}
}
?>