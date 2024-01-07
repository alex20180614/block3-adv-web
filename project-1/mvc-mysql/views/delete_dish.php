<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Dish Confirmation</title>
</head>
<body>
    <h2>Delete Dish Confirmation</h2>

    <h3 style="color: red;">Are you sure you want to delete the following dish?</h3>
    
    <p>Dish ID: <?php echo $dish['dishID']; ?></p>
    <p>Dish Name: <?php echo $dish['dishName']; ?></p>
    <p>Price: $<?php echo $dish['price']; ?></p>

    <form action="?action=confirm_delete&dishID=<?php echo $dish['dishID']; ?>" method="post">
        <input type="hidden" name="dishID" value="<?php echo $dish['dishID']; ?>">
        <input type="submit" name="submit" value="Confirm Delete">
    </form>
    <p><a href="?action=cancel">Cancel</a></p>
</body>
</html>
