<?php
session_start();
if(!empty($_SESSION['user_id'])){
}
else{
	echo '
	<script language="javascript" type="text/javascript">
		window.location="http://'.$_SERVER['HTTP_HOST'].'"
	</script>
	';
}
include("../functions/db_connect_function.php");
db_connect();

include("./common/count_new_pending_projects_assigned_function.php");
include("./common/count_new_current_projects_assigned_function.php");

$option=$_GET['option'];

if(function_exists($option)){ $option(); }
?>