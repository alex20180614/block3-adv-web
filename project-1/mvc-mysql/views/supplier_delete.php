
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php if (isset($supplier)): ?>
        <h2>Delete Supplier Confirmation</h2>
        <p style="color: red;">Are you sure you want to delete?</p>
        <p><strong>Supplier ID:</strong> <?php echo $supplier['supplierID']; ?></p>
        <p><strong>Name:</strong> <?php echo $supplier['supplierName']; ?></p>
        <p><strong>Supplier Location:</strong> <?php echo $supplier['supplierLocation']; ?></p>

        <form method="post" action="?action=confirm_deleteSupplier&supplierID=<?php echo $supplier['supplierID']; ?>">
            <input type="hidden" name="supplierID" value="<?php echo $supplier['supplierID']; ?>">
            <input type="submit" name="submit" value="Confirm Delete">
        </form>

        <a href="?action=showSuppliers">Cancel</a>
    <?php else: ?>
        <p>Error: Supplier details not available.</p>
        <a href="?action=showSuppliers">Go back</a>
    <?php endif; ?>
</body>
</html>

