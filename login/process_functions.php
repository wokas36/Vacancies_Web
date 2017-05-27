<?php
session_start();
include("../functions/db_connect_function.php");
db_connect();

include("./check_login_function.php");
include("./logout_function.php");
include("./recover_password_function.php");

$action=$_GET['action'];

if(function_exists($action)){ $action(); }	
?>