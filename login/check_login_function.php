<?php
function check_login(){

$users_table="users";

$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['password']);

	$check=mysql_query("select * from $users_table where username='$username' && password='$password'");
	$count=mysql_num_rows($check);
	
	if($count > 0){
		$row_user=mysql_fetch_array($check);
		
		$user_id=$row_user['user_id'];
		$active=$row_user['active'];
		$privilege=$row_user['privilege'];
		
		$_SESSION['user_id']=$user_id;
		$_SESSION['privilege']=$privilege;
		
		if($active == "1"){
			
			// login successful
			echo ' 	
				<script language="javascript" type="text/javascript">
				window.location="../?option=dashboard";
				</script>';	
		}
		else{
			$_SESSION['notify']="Your account has been disabled by your owner.";
			$_SESSION['status']="failed";
		
			echo ' 	
			<script language="javascript" type="text/javascript">
			window.location="../login.php";
			</script>';	
		}
	}
	else {
		$_SESSION['notify']="Your username and password are not matching.";
		$_SESSION['status']="failed";
		
		echo ' 	
		<script language="javascript" type="text/javascript">
		window.location="../login.php";
		</script>';	
	}
}
?>