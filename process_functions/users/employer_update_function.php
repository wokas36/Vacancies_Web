<?php
function investigator_update(){
	
	$users_table="users";
	$investigator_table="employer";
	$investigator_id=mysql_real_escape_string($_GET['investigator_id']);
	
	$uname=$_POST['uname'];
	$pword=$_POST['pword'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$fullname=$fname. ' ' . $lname;
	$address=$_POST['address'];
	$nic_no=$_POST['nic_no'];
	$epf_no=$_POST['epf_no'];
	$experiance=$_POST['experiance'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	
	$update_record1=mysql_query("update $investigator_table set nic_no='$nic_no', investigator_name='$fullname', epf_no='$epf_no', experiance='$experiance' where investigator_id='$investigator_id'");
	$update_record2=mysql_query("update $users_table set username='$uname', password='$pword', first_name='$fname', last_name='$lname', address='$address', phone_no='$phone', email='$email' where user_id='$investigator_id'");
	
	if($update_record1 && $update_record2){
		$_SESSION['notify']="Successfully saved the details.";
		$_SESSION['status']="success";
	}
	else{
		$_SESSION['notify']="Details saving was failed.";
		$_SESSION['status']="failed";
	}
	
	$ref=$_SERVER['HTTP_REFERER'];
	
	echo '
	<script language="javascript" type="text/javascript">
		window.location="'.$ref.'"
	</script>
	';
}
?>