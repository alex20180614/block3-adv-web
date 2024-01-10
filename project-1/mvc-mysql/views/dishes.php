<!-- views/dishes.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishes</title>
</head>
<body>

<h2>Dishes</h2>

<?php
if ($dishes) {
    foreach ($dishes as $dish) {
        var_dump($dishes);
        echo "<p>Dish Name: " . $dish['DishName'] . ", Price: $" . ($dish['Price'] ?? 'N/A') . ", Description: " . $dish['Description'] . "</p>";
        // Add additional information as needed
    }
} else {
    echo 'No dishes found';
}
?>

</body>
</html>




