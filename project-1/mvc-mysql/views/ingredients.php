<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Ingredients</title>
</head>
<body>

<h2>Enter new entry</h2>

<table>
    <thead>
        <tr>
            <th>Ingredient ID</th>
            <th>Ingredient Name</th>
            <th>IngredientType</th>
            <th>PricePerUnit</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ingredients as $ingredient) : ?>
            <tr>
                <td><?php echo $ingredient['ingredientID']; ?></td>
                <td><?php echo $ingredient['ingredientName']; ?></td>
                <td><?php echo $ingredient['IngredientType']; ?></td>
                <td><?php echo $ingredient['PricePerUnit']; ?> $</td>
                <td>
                    <a class="btn-delete" href="?action=deleteIngredient&ingredientID=<?php echo $ingredient['ingredientID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a class="btn-add-vendor" href="?action=showIngredientForm">Add New Ingredient</a></p>

</body>
</html> 


