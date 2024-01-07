<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dish</title>

</head>
<body>
<h1>Enter new entry</h1>
<a class="btn-back" href="?action=home">Add Dish</a>
<?php

echo '<div>';
if ($dishs) {
    foreach ($dishs as $dish) {
        echo '<p>' . 
            'Dish ID: ' . $dish['dishID'] . '<br>' . 
            'Dish Name: ' . $dish['dishName'] . '<br>' . 
            'Price: $' . $dish['price'] . '<br>' . 
            '<a class="btn-edit" href="?action=edit&dishID=' . $dish['dishID'] . '">Edit</a> ' . 
            '<a class="btn-delete" href="?action=delete&dishID=' . $dish['dishID'] . '">Delete</a>' . 
            '</p>';
    }
} else {
    echo '<p>No dishes found</p>';
}
echo '</div>';

?>
    
</body>
</html>