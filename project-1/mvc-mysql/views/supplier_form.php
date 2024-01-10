<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Supplier</title>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: black;
            text-decoration: none;
            border-radius: 5px;
        }
     </style>
</head>
<body>

    <h2>Add New Supplier</h2>

    <form action="?action=addSupplier" method="post">
        <label for="supplierName">Supplier Name:</label>
        <input type="text" id="supplierName" name="supplierName"><br>

        <label for="supplierLocation">Location:</label>
        <input type="text" id="supplierLocation" name="supplierLocation"><br>

        <input type="submit" name="submit" value="Add Supplier">
    </form>

    <p><a class="btn" href="?action=showSuppliers">Back</a></p>

</body>
</html>
