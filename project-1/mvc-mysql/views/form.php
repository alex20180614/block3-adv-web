<!-- views/form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #333;
}

.aa {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}


</style>
<body>

<h2>Add Dish</h2>

<form class="aa" method="post">
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

