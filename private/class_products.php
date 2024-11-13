<?php

include_once ('class_database.php');//includes the PHP file class_database.php, which contains the Database class.

class Product extends Database
{ 		 //the product class inherits all the properties and methods of the Database class.(Inheritance)
	public $id;
	public $name;
	public $description;
	public $price;



	protected static $table_name = "products"; // Assuming your table name is 'products'
	protected static $db_columns = ['id', 'name', 'description', 'price']; // Assuming these are your column names

}


?>