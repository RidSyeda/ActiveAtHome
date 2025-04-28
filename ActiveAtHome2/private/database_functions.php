<?php

function db_connect() {
	$database = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);  //create the object $connection
	confirm_db_connect($database);
	return $database; // the function returns the object $connection
	}
	
function confirm_db_connect($database) {
	
	if($database->connect_errno==0) {
		//echo "Connection to DB succeed. <br>";	
	}
	function is_post_request() {
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
	
	if($database->connect_errno>0) {
		$msg = "Database connection failed: ";
		$msg .= $database->connect_error;
		$msg .= " (" . $database->connect_errno . ")";
		echo $msg;
		echo "<br>";	
	}
	}
	




?>