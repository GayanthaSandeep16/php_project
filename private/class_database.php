<?php
class Database
{ //Start of Database class 
	static protected $database;  //a static protected variable that stores the database connection.
	static protected $table_name = ""; //a static protected variable that stores the name of the table.
	static protected $columns;//a static protected variable that stores the columns of the table.

	//connect function that establishes a connection to the database.
	public static function setup_database($db)
	{
		self::$database = $db;
	}

	// find_by_sql function that takes an SQL query as a parameter and returns an array of objects of the current class.
	public static function find_by_sql($sql)
	{
		$results = self::$database->query($sql);//executes the SQL query and stores the result set in the "$results" variable.

		if (!$results) {
			echo "Database Query Failed";
		} else {
			$object_array = [];//declares an empty array called "$object_array".

			while ($record = $results->fetch_assoc()) {//loops through the result set, and for each record

				$object_array[] = static::instantiate($record);//creates a new object of the current class using the "instantiate" method (described later) and adds it to the "$object_array".
			}
			return $object_array;
		}
	}

	//instantiate function that takes a record array as a parameter and returns an object of the current class.`
	//This method creates a new object of the current class and assigns the values of the record array to the object's properties.
	protected static function instantiate($record)
	{
		$o = new static; //creates a new object of the current class and stores it in the "$o" variable.

		foreach ($record as $key => $value) { //loops through each key-value pair in the record array
			if (property_exists($o, $key))//checks if the object has a property with the same name
				$o->$key = $value;
		}

		return $o;

	}


	//get_all_data records that returns an array of objects of the current class.
//This method constructs an SQL query to select all records from the  respective table and calls the find_by_sql method to execute the query.
	public static function get_all_data()
	{
		$sql = "SELECT * FROM " . static::$table_name;
		return static::find_by_sql($sql);
	}

	//find_by_id function that takes an ID as a parameter and returns an object of the current class.
//This method constructs an SQL query to select a record with the given ID and calls the find_by_sql method to execute the query.
	public static function find_by_id($id)
	{
		$sql = "SELECT * FROM " . static::$table_name . " WHERE id = ?";
		$stmt = self::$database->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result_set = $stmt->get_result();
		$stmt->close();

		if ($result_set->num_rows > 0) {
			return static::instantiate($result_set->fetch_assoc());
		} else {
			return false;
		}
	}

	//add function that inserts a new record into the database.
	public function add_record()
	{
		$attr = $this->attributes();
		$sql = "INSERT INTO " . static::$table_name . " (";
		$sql .= join(',', array_keys($attr));
		$sql .= ") VALUES ( '";
		$sql .= join("','", array_values($attr)) . "')";
		$results = static::$database->query($sql);

		if ($results) {
			$this->id = static::$database->insert_id;
		}
		return $results;
	}


	//attributes function that returns an array of the object's attributes.
	public function attributes()
	{
		$attributes = [];

		foreach (static::$db_columns as $c) {
			if ($c != 'id')
				$attributes[$c] = $this->$c;
		}
		return $attributes;
	}



}


?>