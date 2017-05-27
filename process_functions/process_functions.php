<?php
session_start();
include("../login/inside_check_reg.php");

include("../functions/db_connect_function.php");
db_connect();

include("./common/createThumbs_function.php");

include("./users/applicant_add_function.php");
include("./users/employer_add_function.php");
include("./users/applicant_update_function.php");
include("./users/employer_update_function.php");
include("./users/applicant_remove_function.php");
include("./users/employer_remove_function.php");
include("./users/profile_update_function.php");

$action=$_GET['action'];

if(function_exists($action)){ $action(); }	
?>