<!-- dishes.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

    <title>Dishes</title>

    <script>
        function confirmDelete(dishId) {
            var confirmDelete = confirm("Are you sure you want to delete this dish?");
            if (confirmDelete) {
                <?php echo "window.location.href = 'index.php?action=deleteDish&dishId=' + dishId;"; ?>
            }
        }
    </script>
</head>

<body>

<h2>Dishes</h2>

<?php
if ($dishes) {
    foreach ($dishes as $dish) {
        echo "<div>";
        echo "<p>Dish Name: " . $dish['DishName'] . ", Price: $" . ($dish['Price'] ?? 'N/A') . ", Description: " . $dish['Description'] . "</p>";

// Edit button
       echo "<a style='padding: 10px;' href='index.php?action=showEditForm&dishId={$dish['DishID']}' class='edit-btn'>Edit</a>";

        // Delete button with form submission
        echo "<form method='get' action='index.php'>";
        echo "<input type='hidden' name='action' value='deleteDish'>";
        echo "<input type='hidden' name='dishId' value='{$dish['DishID']}'>";
        echo "<a style='padding: 10px;' href='#' class='delete-btn' onclick='return confirmDelete({$dish['DishID']})'>Delete</a>";
        echo "</form>";

        echo "</div>";
    }
} else {
    echo 'No dishes found';
}
?>

</body>
</html>
