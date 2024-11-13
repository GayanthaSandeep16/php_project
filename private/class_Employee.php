<?php

include_once ('class_database.php'); //includes the PHP file class_database.php, which contains the Database class.
class Employee extends Database
{ 	 //the Employee class inherits all the properties and methods of the Database class.	
	public $id; //public properties for the Employee class
	public $name;
	public $email;
	public $username;
	public $mobile_number;


	static public $table_name = 'employees'; //This property specifies the name of the database table that the Employee class is associated with.
	static protected $db_columns = ['id', 'name', 'email', 'username', 'mobile_number'];// This property is used by the parent Database class to construct SQL queries.


	//update function that updates the object's record in the database.
	public function update()
	{
		$attr = $this->attributes();
		$attr_pairs = [];

		foreach ($attr as $k => $v) {
			$attr_pairs[] = "{$k}='{$v}'";
		}

		$sql = "UPDATE " . static::$table_name . " SET ";
		$sql .= join(' , ', $attr_pairs);
		$sql .= " WHERE id='$this->id'";

		$results = static::$database->query($sql);
		return $results;
	}
	
	//delete function that deletes the object's record from the database.
	public function delete()
	{
		$sql = "DELETE FROM " . static::$table_name . " WHERE id='$this->id'";
		$results = static::$database->query($sql);
		return $results;

	}
}

?>