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
        
        $Product_array = product::get_all_data(); //find all the products
        

        echo "<table>";
        echo "<th> Name </th>";
        echo "<th> Description </th>";
        echo "<th> Price </th>";
        echo "</tr>";

        foreach ($Product_array as $Product) {
            //display the product details
            echo "<tr>";
            echo "<td> <a href=view_products.php?id=" . $Product->id . "'>" . $Product->name . "</a> </td>";
            echo "<td>" . $Product->description . "</td>";
            echo "<td>" . "₤" . $Product->price . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

    </section>
    <!-- include the footer -->
    <?php include 'footer.html'; ?>
</body>


</html>