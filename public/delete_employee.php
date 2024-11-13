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

			$results = $Employee->delete();  	//delete the employee record
		
			if ($results)
				echo "Employee has been deleted succesfully <br>";
			else
				echo "Error! Issue with updating the records<br>";

		} else {

			$Employee_id = $_GET['id'];
			$Employee = Employee::find_by_id($Employee_id); //find the employee by id
		
			//display the form to delete the employee record
			echo "<form action=delete_Employee.php method='post'>";
			echo " <h4> Do you want to delete the following entry ? </h4> ";
			echo "<table>";
			echo "<tr> <td> Employee ID </td> <td> <input type='text' readonly name ='id' value='$Employee->id'> </td> </tr>";
			echo "<tr> <td> Name </td> <td> <input type='text' readonly name ='name' value='" . $Employee->name . "'> </td> </tr>";
			echo "<tr> <td> Email </td> <td> <input type='text' readonly name ='email' value='$Employee->email'> </td> </tr>";
			echo "<tr> <td> User Name</td> <td> <input type='text' readonly name ='username' value='$Employee->username'> </td> </tr>";
			echo "</table>";
			echo " <br> <br> <input type='submit' value='Delete' />";
			echo "</form>";
		}
		?>

	</section>
	<!-- include the footer -->
	<?php include 'footer.html'; ?>
</body>

</html>