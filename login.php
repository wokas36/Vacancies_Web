<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ඇබෑර්තු.lk</title>
<link rel="icon" type="image/png" href="images/icons/favicon.png">
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./js/jquery-1.7.2.js"></script>

<script type="text/javascript" src="./js/jquery-ui.js"></script>

</head>
<body>

<section class="main_container">

    <section class="span16">
    	
        <div class="login_data_content width_pcnt_40">
        
            <div id="login_form">
                <header class="content_header">
                <h3><center>ඇබෑර්තු.lk</center></h3>
                </header>
                
                <form action="./login/process_functions.php?action=check_login" method="post" onSubmit="return loginFormValidate();">
                <fieldset>
                
                <div class="input_group">
                
                    <div class="input_label_attached">Username &nbsp;: </div>
                    <div class="width_pcnt_80 float_left">
                    <input type="text" class="width_pcnt_100" placeholder="Username" name="username" id="username" required_id="username_required" onkeyup="removeErrorHighlight(this)" />
                    <div class="clear"></div>
                    <span class="required" id="username_required">Valid username required</span>
                    </div>
                    <div class="clear"></div>
                
                </div>
                
                <div class="input_group">
                
                    <div class="input_label_attached">Password &nbsp;&nbsp;: </div>
                    <div class="width_pcnt_80 float_left">
                    <input type="password" class="width_pcnt_100" placeholder="Password" name="password" id="password" required_id="password_required" onkeyup="removeErrorHighlight(this)" />
                    <div class="clear"></div>
                    <span class="required" id="password_required">Password required</span>
                    </div>
                    <div class="clear"></div>
                
                </div>
            
                <div class="input_group_border_none">
                    
                    <div class="width_pcnt_50 float_left">
                    <input type="submit" class="btn btn-primary" value="SIGN IN" />
					<a href="signup.php" class="btn btn-primary">SIGN UP</a>
                    </div>
                    <div class="clear"></div>
                </div>
                
                </fieldset>
                </form>
            </div>

        </div>
    </section>

</section>

<!-- jQuery jGrowl -->
<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>

<script language="javascript" type="text/javascript">
$(document).ready(function() {
	
<?php
	$notify=$_SESSION['notify'];
	$status=$_SESSION['status'];
	
	if(!empty($notify)){
		
		if($status == "success"){
		?>
			$.jGrowl("<?php echo $notify; ?>", { theme: 'success',	beforeClose: function() { return false;}});
		<?php
		}
		else if($status == "failed"){
		?>
			$.jGrowl("<?php echo $notify; ?>", {theme: 'danger',	beforeClose: function() { return false;}});
		<?php
		}
		else{
		}
		
		unset($_SESSION['notify']);
		unset($_SESSION['status']);
	}
?>
});

function showPasswordRecoverForm(){
	
	$('#login_form').slideUp(500);
	$('#password_recover_form').slideDown(500);
}

function showLoginForm(){
	
	$('#password_recover_form').slideUp(500);
	$('#login_form').slideDown(500);
}

function loginFormValidate(){
	
	var errors=0;
	
	checkEmpty($('#username'));
	checkEmpty($('#password'));
	
	function checkEmpty(elem){
		
		var elem_required=$(elem).attr('required_id');
		
		if($(elem).val() == ""){
			$(elem).css({"border-color":"#B94A48"});
			$('#'+elem_required).fadeIn();
			errors++;
		}
		else{
			removeErrorHighlight(elem);
		}
	}
	
	if(errors > 0){
		return false;
	}
	else{
		return true;
	}
}


function prFormValidate(){
	
	var errors=0;
	
	checkEmailError($('#recover_username'));
	
	function checkEmpty(elem){
		
		var elem_required=$(elem).attr('required_id');
		
		if($(elem).val() == ""){
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
		
		if(!elem.val().match(emailExp)){
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

<!-- Scripts -->
<script src="js/bootstrap/bootstrap-alert.js"></script>
<script src="js/bootstrap/bootstrap-tooltip.js"></script>
<script src="js/bootstrap/bootstrap-collapse.js"></script>
<script src="js/bootstrap/bootstrap-inputmask.js"></script>
<!-- Scripts -->

</body>
</html>
