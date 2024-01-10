


<h2><?php echo isset($dish) ? 'Edit Dish Information' : 'Add dish'; ?></h2>

<form class="edit-form" action="?action=<?php echo isset($dish) ? 'update' : 'add'; ?>" method="post">
    <?php if (isset($dish)) : ?>
        <input type="hidden" name="dishID" value="<?php echo $dish['dishID']; ?>">
    <?php endif; ?>

    <?php if (isset($dish)) : ?>
        <input type="hidden" name="action" value="update">
    <?php endif; ?>

    <label for="dishName">Dish Name:</label>
    <input type="text" id="dishName" name="dishName" value="<?php echo isset($dish) ? $dish['dishName'] : ''; ?>" required>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="<?php echo isset($dish) ? $dish['price'] : ''; ?>" step="0.01" required>

    <button type="submit" name="submit" value="<?php echo isset($dish) ? 'update' : 'add'; ?>">
        <?php echo isset($dish) ? 'Update Dish' : 'Add Dish'; ?>
    </button>
</form>


