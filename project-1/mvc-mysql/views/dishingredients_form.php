<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishingredients</title>
</head>
<body>
    <h1>List of Dishingredients</h1>

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
            foreach ($dishingredients as $dishingredient) {
                echo "<tr>";
                echo "<td>{$dishingredient['dishingredientsID']}</td>";
                echo "<td>" . (isset($dishingredient['dishingredientsName']) ? $dishingredient['dishingredientsName'] : '') . "</td>";
                echo "<td>" . (isset($dishingredient['dishID']) ? $dishingredient['dishID'] : '') . "</td>";
                echo "<td>" . (isset($dishingredient['supplierID']) ? $dishingredient['supplierID'] : '') . "</td>";
                echo "<td>" . (isset($dishingredient['ingredientID']) ? $dishingredient['ingredientID'] : '') . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>

    <a class="btn-vendor" href="?action=showDishingredients">Add Dishingredients</a>
</body>
</html>


