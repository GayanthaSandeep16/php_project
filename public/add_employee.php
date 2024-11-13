<!DOCTYPE html>
<html lang="en">

<head>
	<title>Organic Snacks</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="header">
	</div>
	<!-- include the navigation bar -->
	<?php include 'navigation.html'; ?>

	<section>
		<?php
		include '../private/initialize.php';  //initialize the website
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$Employee = new Employee();
			$Employee->name = $_POST["name"];
			$Employee->email = $_POST["email"];
			$Employee->username = $_POST["username"];
			$Employee->mobile_number = $_POST["mobile_number"];
			$results = $Employee->add_record();        //add the employee
		
			if ($results)
				echo "Employee Added Successfully !";
			else
				echo "Error with Adding Employee !";

		} else {
			//display the form to add a new employee
			echo "<form action='add_employee.php' method='post'>";
			echo "<h4>Use the following form to add a new Employee</h4>";
			echo "<label for='name'>Name:</label> <input type='text' name='name'><br>";
			echo "<label for='email'>Email:</label> <input type='text' name='email'><br>";
			echo "<label for='username'>User Name:</label> <input type='text' name='username'><br>";
			echo "<label for='mobile_number'>Mobile Number:</label> <input type='text' name='mobile_number'><br>";
			echo "<br><input type='submit' value='Add New'>";
			echo "</form>";
		}
		?>
	</section>
	<!-- include the footer -->
	<?php include 'footer.html'; ?>
</body>

</html>