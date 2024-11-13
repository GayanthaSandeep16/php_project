<?php
require_once ("db_connections.php");
require_once ("credentials.php");
require_once ("class_employee.php");
require_once ("class_products.php");
require_once ("class_database.php");

$db_conn = db_connect(); //function, which connects to a database using the information provided in credentials.php
Database::setup_database($db_conn);  //static method, which sets the database connection for the Database class.
?>