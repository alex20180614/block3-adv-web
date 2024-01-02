<form method="post" action="views/form.php">
    <select name="" id="">
        <option value="">Select a supplier</option>
        <?php
        if($suppliers) {
            foreach($suppliers as $supplier) {
                echo "<option value=" .  $supplier['SupplierID'] . ">" . $supplier['SupplierName'] . "</option>";
            }
        } else {
            echo 'No suppliers found';
        }
        ?>
    </select>
</form>

