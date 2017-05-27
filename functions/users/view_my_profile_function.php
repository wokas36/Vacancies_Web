<?php
function view_my_profile(){
	
	$users_table="users";
	
	$user_id=$_SESSION['user_id'];	
	
	$read_profile=mysql_query("select * from $users_table where user_id='$user_id'");
			
	$rows_profile=mysql_fetch_array($read_profile);
	
	$full_name=$rows_profile['first_name']." ".$rows_profile['last_name'];
	$address=$rows_profile['address'];
	$phone=$rows_profile['phone_no'];
	$email=$rows_profile['email'];
	$privilege=$rows_profile['privilege'];
	$registration_date=$rows_profile['registration_date'];
	?>
    <header class="content_header">
    <h2>My Profile</h2>
    </header>
    
    <div id="accordionName" class="accordion">
        <div class="accordion-group">
            <div class="accordion-heading">
            <a class="accordion-toggle collapsed" href="#accordionTabOne" data-parent="#accordionName" data-toggle="collapse">General Details</a>
            </div>
            <div id="accordionTabOne" class="accordion-body collapse">
                <div class="accordion-inner">
                
                    <div class="span5">
                        <h6><span class="label_title">Name &nbsp;:</span> <?php echo $full_name; ?></h6>
                        <h6><span class="label_title">Phone :</span> <?php echo $phone; ?></h6>
                        <h6><span class="label_title">Email :</span> <a href="javascript:;"><?php echo $email; ?></a></h6>
                        <div class="clear"></div>
                    </div>
                    <div class="span6">
						<h6><span class="label_title">Permission Level :</span> <?php echo $privilege; ?></h6>
                        <h6><span class="label_title">Address  :</span> <?php echo $address; ?></h6>
						<h6><span class="label_title">Registration Date :</span> <?php echo $registration_date; ?></h6>
                        <div class="clear"></div>
                    </div>
                	<?php
					echo '<div class="clear"></div>';
					echo '<a href="./?option=profile_update_form"><button class="btn btn-info float_right">Edit</button></a>';
					?>
                  	<div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>