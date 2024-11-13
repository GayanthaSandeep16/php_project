<!DOCTYPE html>
<html lang="en">

<head>
	<title>Organic Snacks</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
	<div class="header">
	</div>
	<!-- include the navigation bar -->
	<?php include 'navigation.html'; ?>
	</div>
	<section>
		<div class="column middle">
			<?php
			include '../private/initialize.php';  //initialize the website	
			$Employee_array = employee::get_all_data();  //find all the employees
			
			echo "<table>";
			echo "<th> Name </th>";
			echo "<th> Email </th>";
			echo "<th> Mobile Number </th>";
			echo "<th> User Name </th>";
			echo "<th> Update </th>";
			echo "<th> Delete </th>";
			echo "</tr>";

			foreach ($Employee_array as $Employee) {
				//display the employee details
				echo "<tr>";
				echo "<td><a href='view_employee.php?id=" . $Employee->id . "'>" . $Employee->name . "</a></td>";
				echo "<td>" . $Employee->email . "</td>";
				echo "<td>" . $Employee->mobile_number . "</td>";
				echo "<td>" . $Employee->username . "</td>";
				echo "<td><a href='update_employee.php?id=" . $Employee->id . "' style='color: green;'>Update <i class='fas fa-pencil-alt' style='color: green;'></i></a></td>";
				echo "<td><a href='delete_employee.php?id=" . $Employee->id . "' style='color: red;'>Delete <i class='fas fa-times-circle' style='color: red;'></i></a></td>";
				echo "</tr>";
			}
			echo "</table>";
			?>
	</section>
	<!-- include the footer -->
	<?php include 'footer.html'; ?>


</body>


</html>