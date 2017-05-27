<?php
function db_connect(){
	
	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_database="dbms_abarthu";
	
	mysql_connect($db_host, $db_user, $db_pass) or die("Could not connect to the database server");
	
	mysql_select_db($db_database) or die("Could not connect to the database");
}
?>