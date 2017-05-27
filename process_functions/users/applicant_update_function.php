<?php
function employee_update(){
	
	$users_table="users";
	$employee_table="applicant";
	$employee_id=mysql_real_escape_string($_GET['employee_id']);
	
	$uname=$_POST['uname'];
	$pword=$_POST['pword'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$fullname=$fname. ' ' . $lname;
	$address=$_POST['address'];
	$nic_no=$_POST['nic_no'];
	$epf_no=$_POST['epf_no'];
	$job_description=$_POST['job_description'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	
	$update_record1=mysql_query("update $employee_table set nic_no='$nic_no', employee_name='$fullname', epf_no='$epf_no', job_description='$job_description' where employee_id='$employee_id'");
	$update_record2=mysql_query("update $users_table set username='$uname', password='$pword', first_name='$fname', last_name='$lname', address='$address', phone_no='$phone', email='$email' where user_id='$employee_id'");
	
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