<!-- views/form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish</title>
</head>
<body>

<h2>Add Dish</h2>

<form action="" method="post">
    <div>
        <label for="dishName">Dish Name</label>
        <input type="text" name="dishName" required>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" required>
    </div>
    <!-- <div>
        <label for="price">Price</label>
        <input type="number" name="price" step="0.01"> 
    </div> -->
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price">
    </div>
    <div>
        <input type="submit" name="submit" value="Add Dish">
    </div>
</form>

</body>
</html>

</html>

