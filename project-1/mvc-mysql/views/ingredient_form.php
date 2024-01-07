<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ingredient</title>
</head>
<body>

<h2>Add  Ingredient</h2>

<form action="?action=addIngredient" method="post">
    <label for="ingredientName">Ingredient Name:</label>
    <input type="text" id="ingredientName" name="ingredientName"><br>

    <label for="IngredientType">Type:</label>
    <input type="text" id="IngredientType" name="IngredientType"><br>

    <label for="PricePerUnit">Price:</label>
    <input type="text" id="PricePerUnit" name="PricePerUnit"><br>

    <input type="submit" name="submit" value="Add Ingredient">
</form>

<p><a class="btn-vendor" href="?action=showIngredients">Back</a></p>

</body>
</html>
