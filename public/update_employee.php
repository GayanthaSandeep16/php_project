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

			$Employee->id = $_POST["id"];
			$Employee->name = $_POST["name"];
			$Employee->email = $_POST["email"];
			$Employee->username = $_POST["username"];
			$Employee->mobile_number = $_POST["mobile_number"];


			$results = $Employee->update(); //update the employee
		
			if ($results)
				echo "Records updated succesfully <br>";
			else
				echo "Error! Issue with updating the records<br>";

		} else {

			$id = $_GET['id'];
			$Employee = Employee::find_by_id($id); //find the employee by id record
		
			//display the form to update the employee record
			echo "<form action='update_Employee.php' method='post'>";
			echo "<h4>Update the following Employee</h4><br>";
			echo "<label for='id'>Employee ID:</label> <input type='text' readonly name='id' value='$Employee->id'><br>";
			echo "<label for='name'>Name:</label> <input type='text' name='name' value='$Employee->name'><br>";
			echo "<label for='email'>Email:</label> <input type='text' name='email' value='$Employee->email'><br>";
			echo "<label for='username'>Mobile number:</label> <input type='text' name='mobile_number' value='$Employee->mobile_number'><br>";
			echo "<label for='username'>User Name:</label> <input type='text' name='username' value='$Employee->username'><br>";
			echo "<br><input type='submit' value='Update'>";
			echo "</form>";

		}
		?>
	</section>
	<!-- include the footer -->
	<?php include 'footer.html'; ?>


</body>


</html>