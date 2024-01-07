<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Ingredient Confirmation</title>
</head>
<body>

<h2>Delete Ingredient Confirmation</h2>
<p style="color: red;">Are you sure you want to delete the following ingredient?</p>
<p><strong>Ingredient ID:</strong> <?php echo $ingredient['ingredientID']; ?></p>
<p><strong>Ingredient Name:</strong> <?php echo $ingredient['ingredientName']; ?></p>
<p><strong>Type:</strong> <?php echo $ingredient['IngredientType']; ?></p>
<p><strong>Price:</strong> $<?php echo $ingredient['PricePerUnit']; ?></p>

<form method="post" action="?action=confirm_deleteIngredient&ingredientID=<?php echo $ingredient['ingredientID']; ?>">
    <input type="hidden" name="ingredientID" value="<?php echo $ingredient['ingredientID']; ?>">
    <input type="submit" name="submit" value="Confirm Delete">
</form>

<a href="?action=showIngredients">Cancel</a>

</body>
</html>


