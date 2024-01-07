<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>

</head>
<body>
 
  <div class="suppliers-container">
     <a  href="?action=showSupplierForm">Add Supplier</a>
    <?php foreach ($suppliers as $supplier): ?>
        <div class="supplier-card">
            <h3><?php echo $supplier['supplierName']; ?></h3>
            <p><strong>Supplier ID:</strong> <?php echo $supplier['supplierID']; ?></p>
            <p><strong>Supplier Location:</strong> <?php echo $supplier['supplierLocation']; ?></p>
            <a class="btn-delete" href="?action=deleteSupplier&supplierID=<?php echo $supplier['supplierID']; ?>">Delete</a>
        </div>
    <?php endforeach; ?>
</div>

   

</body>
</html>
