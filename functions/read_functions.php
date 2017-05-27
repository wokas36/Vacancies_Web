<?php
include("./functions/db_connect_function.php");
db_connect();

include("./functions/common/sidebar_content_function.php");
include("./functions/common/footer_content_function.php");
include("./functions/common/main_header_content_function.php");

include("./functions/dashboard/dashboard_function.php");
include("./functions/users/view_my_profile_function.php");

$privilege=$_SESSION['privilege'];

if($privilege == 'Administrator' || $privilege == 'Employer' ) {
	
	include("./functions/users/read_employers_function.php");
	include("./functions/users/view_employers_profile_function.php");
	include("./functions/users/read_applicants_function.php");
	include("./functions/users/view_applicants_profile_function.php");
	include("./functions/users/view_user_function.php");

}   else if($privilege == 'Applicant') {

	include("./functions/users/read_applicants_function.php");
	include("./functions/users/view_applicants_profile_function.php");
	include("./functions/users/view_user_function.php");

}
?>