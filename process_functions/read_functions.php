<?php

$privilege=$_SESSION['privilege'];

if($privilege == 'Administrator') {
	
	include("./process_functions/users/applicant_add_form_function.php");
	include("./process_functions/users/employer_add_form_function.php");
	include("./process_functions/users/applicant_update_form_function.php");
	include("./process_functions/users/employer_update_form_function.php");
	include("./process_functions/users/profile_update_form_function.php");
	
} else if($privilege == 'Employer') {
	
	include("./process_functions/users/profile_update_form_function.php");
	
} else if($privilege == 'Applicant') {
	
	include("./process_functions/users/profile_update_form_function.php");

}

?>