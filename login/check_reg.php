<?php
session_start();
if(!empty($_SESSION['user_id'])){
}
else{
	$_SESSION['notify']="Your session has been expired. Please log into the system again.";
	$_SESSION['status']="failed";
	header("location: ./login.php");
}