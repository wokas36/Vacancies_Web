<?php
function investigator_remove(){
	$investigator_table = "employer";
	$users_table = "users";
	$investigator_id=mysql_real_escape_string($_GET['investigator_id']);
	
	$delete_record1 = mysql_query("delete from $investigator_table where investigator_id='$investigator_id'");
	$delete_record2 = mysql_query("delete from $users_table where user_id='$investigator_id'");
	
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