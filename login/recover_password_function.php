<?php
function recover_password(){

$users_table="users";

$username=mysql_real_escape_string($_POST['username']);

	$check=mysql_query("select * from $users_table where email='$username'");
	$count=mysql_num_rows($check);
	
	if($count > 0){
		
		$password=random_character_generator(50);
		
		//reset this user's password
		$reset=mysql_query("update $users_table set pass_phrase='$password' where email='$username'");
		
		$from="noreply@poolservice.com";
		$to=$username;
		$headers="From : $from <$from>";
		$subject="Your new password Pool Service Login";
		$message="
		Dear Administrator,
		Here is your new password that you requested
		
		Password : $password
		";
	
		$send=mail($to, $subject, $message, $headers);
		
		if($send){
			$_SESSION['notify']="Your new password has been sent to your email account.";
			$_SESSION['status']="success";
		}
		else{
			$_SESSION['notify']="Something went wrong. Please try again later.";
			$_SESSION['status']="failed";		
		}
	}
	else{
		$_SESSION['notify']="Your email is not matching with our records. Please double check and try again.";
		$_SESSION['status']="failed";		
	}
	
	$ref=$_SERVER['HTTP_REFERER'];
	echo ' 	
	<script language="javascript" type="text/javascript">
	window.location="'.$ref.'";
	</script>';	
}
?>
