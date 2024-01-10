<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishingredients</title>
</head>
<body>
    <h1>Dishingredients List</h1>
        <a class="btn-vendor" href="?action=showeDishingredients">Add Dishingredients</a>

    <?php
    if ($dishingredients === false) {
        echo "<p>Error fetching data from the database.</p>";
    } else {
    ?>
        <table>
            <tr>
                <th>Dishingredients ID</th>
                <th>Dishingredients Name</th>
                <th>Dish ID</th>
                <th>Supplier ID</th>
                <th>Ingredient ID</th>
            </tr>
            <?php
            foreach ($dishingredients as $dishingredient1) {
                echo "<tr>";
                echo "<td>{$dishingredient1['dishingredientsID']}</td>";
                echo "<td>" . (isset($dishingredient1['dishingredientsName']) ? $dishingredient1['dishingredientsName'] : '') . "</td>";
                echo "<td>" . (isset($dishingredient1['dishID']) ? $dishingredient1['dishID'] : '') . "</td>";
                echo "<td>" . (isset($dishingredient1['supplierID']) ? $dishingredient1['supplierID'] : '') . "</td>";
                echo "<td>" . (isset($dishingredient1['ingredientID']) ? $dishingredient1['ingredientID'] : '') . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>

</body>
</html>


