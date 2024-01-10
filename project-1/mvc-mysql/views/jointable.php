<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishingredients</title>
</head>
<body>
    
    <?php
//     echo '<ul class="grid-container">';
//  var_dump("Executing the query...");
// var_dump("Query result:", $dishesWithDishingredients);
    
    if ($dishesWithDishingredients) {
        foreach ($dishesWithDishingredients as $dish) {
            echo '<li>' . 
                '<p>' . 
                'Dishingredient ID: ' . $dish['dishingredientsID'] . '<br>' . 
                'Dishingredient Name: ' . $dish['dishingredientsName'] . '<br>' . 
                'Dish Name: ' . $dish['dishName'] . '<br>' .
                'Supplier ID: ' . $dish['supplierID'] . '<br>' . 
                'Ingredient ID: ' . $dish['ingredientID'] . '<br>' .
                'Dish Price: $' . $dish['price'] . '<br>' .
                '</p>' .
                '</li>';
        }
    } else {
        echo '<li><p>No Dishingredients found</p></li>';
    }
    
    echo '</ul>';
    ?>
</body>
</html>

