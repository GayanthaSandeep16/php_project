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
    echo "<h2>Product Details</h2><br>";
    $id = $_GET['id'];

    $product = Product::find_by_id($id);  //find the product by id
    //display the product details
    echo "Name : " . $product->name . "<br>";
    echo "Description : " . $product->description . "<br>";
    echo "Price : " . $product->price . "<br>";
    ?>
  </section>

  <!-- include the footer -->
  <?php include 'footer.html'; ?>

</body>


</html>