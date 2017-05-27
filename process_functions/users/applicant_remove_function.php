<?php
function employee_remove(){
	$employee_table = "applicant";
	$users_table = "users";
	$employee_id=mysql_real_escape_string($_GET['employee_id']);
	
	$delete_record1 = mysql_query("delete from $employee_table where employee_id='$employee_id'");
	$delete_record2 = mysql_query("delete from $users_table where user_id='$employee_id'");
	
	if($delete_record1 && $delete_record2){
		$_SESSION['notify']="Successfully removed.";
		$_SESSION['status']="success";
	}
	else{
		$_SESSION['notify']="Details removing was failed.";
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