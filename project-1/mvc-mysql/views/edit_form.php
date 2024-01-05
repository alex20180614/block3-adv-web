<!-- views/edit_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dish</title>
</head>
<style>
    /* Add your styles for the edit form */
</style>
<body>

<h2>Edit Dish</h2>

<form action="index.php?action=editDish" method="post">
    <input type="hidden" name="dishId" value="<?php echo $dishDetails['DishID']; ?>">
    <div>
        <label for="dishName">Dish Name</label>
        <input type="text" name="dishName" value="<?php echo $dishDetails['DishName']; ?>" required>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?php echo $dishDetails['Description']; ?>" required>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo $dishDetails['Price']; ?>">
    </div>
    <div>
        <input type="submit" name="submit" value="Update Dish">
    </div>
</form>
<!-- views/edit_form.php -->






</body>
</html>
