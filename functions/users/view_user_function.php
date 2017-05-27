<?php
function view_employee(){
	
	$users_table="users";
	
	$user_id=$_SESSION['user_id'];	
	$boss_id=$_SESSION['boss_id'];
	$emp_id=mysql_real_escape_string($_GET['emp_id']);
	
	$read_employee=mysql_query("select * from $users_table where ( boss='$boss_id' && user_id='$emp_id') || ( boss='0' && user_id='$emp_id' ) ");
	$check_exist=mysql_num_rows($read_employee);
	
	if($check_exist > 0){
			
		$rows_employee=mysql_fetch_array($read_employee);
	
		$emp_id=$rows_employee['user_id'];
		$full_name=$rows_employee['fname']." ".$rows_employee['lname'];
		$address=$rows_employee['address'];
		$city=$rows_employee['city'];
		$state=$rows_employee['state'];
		$zip_code=$rows_employee['zip_code'];
		$phone=$rows_employee['phone'];
		$email=$rows_employee['email'];
		$joined_date=$rows_employee['joined_date'];
			
		$state_text=get_state($state);
	?>
    <header class="content_header">
    <h2>Employee : <?php echo $full_name; ?></h2>
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
                        <h6><span class="label_title">Email :</span> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h6>
                        <h6><span class="label_title">Added on :</span> <?php echo $joined_date; ?></h6>
                        <div class="clear"></div>
                    </div>
                    <div class="span6">
                        <h6><span class="label_title">Address  :</span> <?php echo $address; ?></h6>
                        <h6><span class="label_title">City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> <?php echo $city; ?></h6>
                        <h6><span class="label_title">State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> <?php echo $state_text; ?></h6>
                        <h6><span class="label_title">Zip code :</span> <?php echo $zip_code; ?></h6>
                        <div class="clear"></div>
                    </div>
                	<?php
					echo '<div class="clear"></div>';
					echo '<a href="./?option=employee_update_form&emp_id='.$emp_id.'"><button class="btn btn-info float_right">Edit</button></a>';
					?>
                  	<div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
            <a class="accordion-toggle collapsed" href="#accordionTabTwo" data-parent="#accordionName" data-toggle="collapse">Pools ( Handles by this employee )</a>
            </div>
            <div id="accordionTabTwo" class="accordion-body collapse" style="height: 0px;">
                <div class="accordion-inner"><?php read_pools_of_employee(); ?></div>
            </div>
        </div>
    </div>
    
    <?php
	}
	else{
	?>
    <header class="content_header">
    <h2>Sorry!!! Customer not exists.</h2>
    </header>
    <?php
	}
}
?>