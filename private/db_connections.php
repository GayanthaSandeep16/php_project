<?php

function db_connect()
{ //a function called db_connect.

	$database = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DB_NAME);// creates a new mysqli object, which represents a connection to a MySQL database 

	if ($database->connect_errno == 0) {
		$msg = "Database connection successful";
		echo "<br>";
	}
	if ($database->connect_errno > 0) {
		$msg = "Database connection failed ";
		$msg .= $database->connect_error;
		$msg .= " (" . $database->connect_errno . ")";
		echo $msg;
		echo "<br>";
	}

	return $database;//returns the $database object, which represents the connection to the MySQL database.

}

?>