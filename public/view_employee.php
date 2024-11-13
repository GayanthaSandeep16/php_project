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

  <section class="view_details">
    <?php
    include '../private/initialize.php';  //initialize the website
    echo "<h2>Employee Details</h2><br>";
    $employee_id = $_GET['id'];

    $Employee = Employee::find_by_id($employee_id); //find the employee by id
    //display the employee details
    
    echo "Name : " . $Employee->name . "<br>";
    echo "Email : " . $Employee->email . "<br>";
    echo "User Name : " . $Employee->username . "<br>";
    echo "Mobile Number : " . $Employee->mobile_number . "<br>";
    ?>
  </section>

  <!-- include the footer -->
  <?php include 'footer.html'; ?>


</body>


</html>