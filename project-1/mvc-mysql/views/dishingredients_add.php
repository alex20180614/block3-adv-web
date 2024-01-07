<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Dishingredients</title>
</head>
<body>
    <h1>Create Dishingredients</h1>
    <?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>

    <form method="post" action="?action=createDishingredients">
        <label for="dishingredientsName">Dishingredients Name:</label>
        <input type="text" name="dishingredientsName" required>
        
        <label for="dishID">Select Dish:</label>
        <select name="dishID" required>
            <option value="" disabled selected>Select Dish</option>
            <?php foreach ($dishes as $dish): ?>
                <option value="<?php echo $dish['dishID']; ?>"><?php echo $dish['dishName']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="supplierID">Select Supplier:</label>
        <select name="supplierID" required>
            <option value="" disabled selected>Select Supplier</option>
            <?php foreach ($suppliers as $supplier): ?>
                <option value="<?php echo $supplier['supplierID']; ?>"><?php echo $supplier['supplierName']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="ingredientID">Select Ingredient:</label>
        <select name="ingredientID" required>
            <option value="" disabled selected>Select Ingredient</option>
            <?php foreach ($ingredients as $ingredient): ?>
                <option value="<?php echo $ingredient['ingredientID']; ?>"><?php echo $ingredient['ingredientName']; ?></option>
            <?php endforeach; ?>
        </select>

        <input class="btn-vendor" type="submit" name="submit" value="Create Dishingredients">
    </form>
</body>
</html>




