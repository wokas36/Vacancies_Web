<?php
function profile_update_form(){
	
	$users_table="users";
	
	$user_id=$_SESSION['user_id'];	
	
	$read_user=mysql_query("select * from $users_table where user_id='$user_id'");
	$rows_user=mysql_fetch_array($read_user);
	
	$password=$rows_user['password'];
	$first_name=$rows_user['first_name'];
	$first_name=$rows_user['first_name'];
	$last_name=$rows_user['last_name'];
	$address=$rows_user['address'];
	$phone=$rows_user['phone_no'];
	$email=$rows_user['email'];
	$privilege=$rows_user['privilege'];
	$user_pic=$rows_user['profile_img'];
	
?>
    <header class="content_header">
    <h3>Profile Update Form</h3>
    </header>

    <form action="./process_functions/process_functions.php?action=profile_update" method="post" onSubmit="return puFormValidate();" enctype="multipart/form-data">
    <fieldset>
	
    <div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">First name <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="First name" name="first_name" id="first_name" required_id="first_name_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $first_name; ?>" />
        <div class="clear"></div>
        <span class="required" id="first_name_required">First name required</span>
        </div>
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Last name <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="Last name" name="last_name" id="last_name" required_id="last_name_required" onkeyup="removeErrorHighlight(this)" value="<?php echo $last_name; ?>" />
        <div class="clear"></div>
        <span class="required" id="last_name_required">Last name required</span>
        </div>
		<div class="clear"></div>
    </div>
    
    <div class="input_group">
        
        <div class="width_pcnt_100 float_left">
        <label class="control-label" for="input">Address <span class="required_text">*</span></label>
        <textarea style="width:95%; padding: 5px;" placeholder="Address" rows="2" name="address" id="address" required_id="address_required" onkeyup="removeErrorHighlight(this)"><?php echo $address; ?></textarea>
        <div class="clear"></div>
        <span class="required" id="address_required">Address required</span>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Phone no</label>
        <input type="text" class="width_pcnt_90" placeholder="Phone no" name="phone" id="phone" value="<?php echo $phone; ?>" />
        </div>
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">Email <span class="required_text">*</span></label>
        <input type="text" class="width_pcnt_90" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    
    <div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">If you need to change your password check this box</label>
        <input type="checkbox" class="width_pcnt_20" onchange="viewPasswordChangeField();" id="change_password" name="change_password" />
        </div>
        
        <div class="width_pcnt_50 float_left" id="change_password_field" style="display:none;">
        <label class="control-label" for="input">Password <span class="required_text">*</span></label>
        <input type="password" class="width_pcnt_90" placeholder="Password" name="password" id="password" value="<?php echo $password; ?>" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    
    <div class="input_group">
        
        <div class="width_pcnt_50 float_left">
        <label class="control-label" for="input">If you need to change your profile image check this box</label>
        <input type="checkbox" class="width_pcnt_20" onchange="viewProfileImageUploadField();" id="change_profile_image" name="change_profile_image" />
        </div>
        
        <div class="width_pcnt_50 float_left" id="profile_image_upload" style="display:none;">
        <label class="control-label" for="input">Browse for your profile image</label>
        <input type="file" class="width_pcnt_90" name="file" id="file" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    
    <input type="hidden" name="user_pic" value="<?php echo $user_pic; ?>" />
    <div class="input_group_border_none">
        
        <div class="width_pcnt_50 float_left">
        <input type="submit" class="btn btn-primary" value="SAVE" />
        </div>
        <div class="clear"></div>
    </div>
    
    </fieldset>
    </form>

<script language="javascript" type="text/javascript">
function puFormValidate(){
	
	var errors=0;
	
	var first_name=document.getElementById('first_name');
	checkEmpty(first_name);
	
	var last_name=document.getElementById('last_name');
	checkEmpty(last_name);
	
	var address=document.getElementById('address');
	checkEmpty(address);
	
	var password=document.getElementById('password');
	checkEmpty(password);
	
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

function viewProfileImageUploadField(){
	
	if(document.getElementById('change_profile_image').checked == true){
		
		$('#profile_image_upload').slideDown(500);
	}
	else{
		
		$('#profile_image_upload').slideUp(500);
	}
}
function viewPasswordChangeField(){
	
	if(document.getElementById('change_password').checked == true){
		
		$('#change_password_field').slideDown(500);
	}
	else{
		
		$('#change_password_field').slideUp(500);
	}
}

</script>
<?php
}
?>