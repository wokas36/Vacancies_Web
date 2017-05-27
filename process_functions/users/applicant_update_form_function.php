<?php
function employee_update_form(){
	$employee_table = "applicant";
	$users_table = "users";
	$employee_id=mysql_real_escape_string($_GET['employee_id']);
	
	$read_employee=mysql_query("select * from $employee_table where employee_id='$employee_id'");
	$num_employees=mysql_num_rows($read_employee);
	$read_user = mysql_query("select * from $users_table where user_id='$employee_id'");
	$num_users=mysql_num_rows($read_user);
		
	if($num_employees == 1 && $num_users == 1){
		$rows_employee=mysql_fetch_array($read_employee);
		$rows_user = mysql_fetch_array($read_user);
		
		$username_taken = $rows_user['username'];
		$password_taken = $rows_user['password'];
		$fname_taken = $rows_user['first_name'];
		$lname_taken = $rows_user['last_name'];
		$address_taken = $rows_user['address'];
		$phone_no_taken = $rows_user['phone_no'];
		$profile_img_taken = $rows_user['profile_img'];
		$email_taken = $rows_user['email'];
		
		$nic_no_taken=$rows_employee['nic_no'];
		$epf_no_taken=$rows_employee['epf_no'];
		$job_description_taken=$rows_employee['job_description'];
?>
    <header class="content_header">
    <h3>Applicant Update Form</h3>
    </header>

    <form action="./process_functions/process_functions.php?action=employee_update&employee_id=<?php echo $employee_id; ?>" method="post" onSubmit="return eufFormValidate();" enctype="multipart/form-data">
    <fieldset>
	
	<div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Username <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="Username" name="uname" id="uname" required_id="uname_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $username_taken; ?>"/>
        <div class="clear"></div>
        <span class="required" id="uname_required">Username required</span>
        </div>
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Password <span class="required_text">*</span></label>
        <input type="password" class="width_pcnt_90" placeholder="Password" name="pword" id="pword" required_id="pword_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $password_taken; ?>"/>
        <div class="clear"></div>
        <span class="required" id="pword_required">Password required</span>
        </div>
        <div class="clear"></div>
    </div>
	
    <div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">First name <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="First name" name="fname" id="fname" required_id="fname_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $fname_taken; ?>"/>
        <div class="clear"></div>
        <span class="required" id="fname_required">First name required</span>
        </div>
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Last name <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="Last name" name="lname" id="lname" required_id="lname_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $lname_taken; ?>"/>
        <div class="clear"></div>
        <span class="required" id="lname_required">Last name required</span>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="input_group">
        
        <div class="width_pcnt_80 float_left">
        <label class="control-label" for="input">Address <span class="required_text">*</span></label>
        <textarea class="width_pcnt_90" placeholder="Address" rows="2" name="address" id="address" required_id="address_required" onkeyup="removeErrorHighlight(this)"><?php echo $address_taken; ?></textarea>
        <div class="clear"></div>
        <span class="required" id="address_required">Address required</span>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">NIC number <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="NIC number" name="nic_no" id="nic_no" required_id="nic_no_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $nic_no_taken; ?>"/>
        <div class="clear"></div>
        <span class="required" id="nic_no_required">NIC number required</span>
        </div>
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">EPF number <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="EPF number" name="epf_no" id="epf_no" required_id="epf_no_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $epf_no_taken; ?>"/>
        <div class="clear"></div>
        <span class="required" id="epf_no_required">EPF number required</span>
        </div>
		<div class="clear"></div>
    </div>
	
	<div class="input_group">
        
        <div class="width_pcnt_80 float_left">
        <label class="control-label" for="input">Job Description <span class="required_text">*</span></label>
        <textarea class="width_pcnt_90" placeholder="Job Description" rows="2" name="job_description" id="job_description" required_id="job_description_required" onkeyup="removeErrorHighlight(this)"><?php echo $job_description_taken; ?></textarea>
        <div class="clear"></div>
        <span class="required" id="job_description_required">Job Description required</span>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Phone <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="Phone" name="phone" id="phone" value="<?php echo $phone_no_taken; ?>"/>
        </div>
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Email <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="Email" name="email" id="email" value="<?php echo $email_taken; ?>"/>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="input_group_border_none">
        
        <div class="width_pcnt_50 float_left">
        <input type="submit" class="btn btn-primary" value="UPDATE" />
        </div>
        <div class="clear"></div>
    </div>
    
    </fieldset>
    </form>

<script language="javascript" type="text/javascript">
<script language="javascript" type="text/javascript">
function eufFormValidate(){
	
	var errors=0;
	
	var uname=document.getElementById('uname');
	checkEmpty(uname);
	
	var pword=document.getElementById('pword');
	checkEmpty(pword);
	
	var fname=document.getElementById('fname');
	checkEmpty(fname);
	
	var lname=document.getElementById('lname');
	checkEmpty(lname);
	
	var address=document.getElementById('address');
	checkEmpty(address);
	
	var nic_no=document.getElementById('nic_no');
	checkEmpty(nic_no);
	
	var nic_no=document.getElementById('epf_no');
	checkEmpty(epf_no);
	
	var job_description=document.getElementById('job_description');
	checkEmpty(job_description);
	
	var email=document.getElementById('email');
	checkEmailError(email);
	
	function checkEmpty(elem){
		
		var elem_required=$(elem).attr('required_id');
		
		if(elem.value == ""){
			$(elem).css({"border-color":"#B94A48"});
			$('#'+elem_required).fadeIn();
			errors++;
		}
		else{
			removeErrorHighlight(elem);
		}
	}
	
	function checkEmailError(elem){
		
		var elem_required=$(elem).attr('required_id');
		
		var emailExp=/^[\w\-\.\+]+\@[a-z A-Z 0-9\.\-]+\.[a-z A-Z 0-9]{2,4}$/;
		
		if(!elem.value.match(emailExp)){
			$(elem).css({"border-color":"#B94A48"});
			$('#'+elem_required).fadeIn();
			errors++;
		}
	}
	
	if(errors > 0){
		return false;
	}
	else{
		return true;
	}
}
	
function removeErrorHighlight(elem){
		
	var elem_required=$(elem).attr('required_id');
		
	$(elem).css({"border-color":"#CCCCCC"});
	$('#'+elem_required).fadeOut();
}
</script>
<?php
}
	else{
		?>
		<header class="content_header">
		<h2>Sorry!!! Employee does not exists.</h2>
		</header>
		<?php
	}
}
?>