<?php
function employee_add(){
	
	$users_table="users";
	$employee_table="applicant";
	
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
	
	$joined_date=date("Y-m-d", time());
	$privilege="Applicant";
	$user_pic="";
	
	$insert_record1=mysql_query("insert into $users_table values('', '$uname', '$pword', '$fname', '$lname', '$address', '$phone', '$user_pic', '$email', '$joined_date', '1', '$privilege')");
	$insert_record2=mysql_query("insert into $employee_table values('$employee_id', '$fullname', '$nic_no', '$epf_no', '$job_description')");
	if($insert_record1 && $insert_record2){
		$_SESSION['notify']="Successfully saved the details.";
		$_SESSION['status']="success";
	}
	else{
		$_SESSION['notify']="details saving was failed.";
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