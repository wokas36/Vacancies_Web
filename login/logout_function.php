<?php
function logout(){

	if(!empty($_SESSION['user_id'])){
		session_unset();
		session_destroy();
		
		echo ' 	
		<script language="javascript" type="text/javascript">
			window.location="../login.php";
		</script>';	
	}
	else{
		
		echo ' 	
		<script language="javascript" type="text/javascript">
			window.location="../login.php";
		</script>';	
	}
}
?> 