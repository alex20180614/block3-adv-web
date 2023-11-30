
<?php

class Supplier {
    public $SupplierID;
    public $SupplierName;
    public $SupplierLocation;

    public function __construct($id, $name, $location) {
        $this->SupplierID = $id;
        $this->SupplierName = $name;
        $this->SupplierLocation = $location;
    }
}

class Ingredient {
    public $IngredientID;
    public $IngredientName;
    public $IngredientType;
    public $SupplierID;
    public $PricePerUnit;

    public function __construct($id, $name, $type, $supplierID, $price) {
        $this->IngredientID = $id;
        $this->IngredientName = $name;
        $this->IngredientType = $type;
        $this->SupplierID = $supplierID;
        $this->PricePerUnit = $price;
    }
}

class Dish {
    public $DishID;
    public $DishName;
    public $Description;

    public function __construct($id, $name, $description) {
        $this->DishID = $id;
        $this->DishName = $name;
        $this->Description = $description;
    }
}

class DishIngredient {
    public $DishID;
    public $IngredientID;
    public $Quantity;

    public function __construct($dishID, $ingredientID, $quantity) {
        $this->DishID = $dishID;
        $this->IngredientID = $ingredientID;
        $this->Quantity = $quantity;
    }
}

$supplier1 = new Supplier(1, 'Farm Fresh Suppliers', 'City A');
$supplier2 = new Supplier(2, 'Organic Ingredients Inc.', 'City B');

// Create instances of Ingredients
$ingredient1 = new Ingredient(101, 'Carrots', 'Vegetable', $supplier1->SupplierID, 1.5);
$ingredient2 = new Ingredient(102, 'Chicken', 'Meat', $supplier2->SupplierID, 5.0);

// Create instances of Dishes
$dish1 = new Dish(201, 'Vegetable Stir Fry', 'A healthy mix of fresh vegetables');
$dish2 = new Dish(202, 'Grilled Chicken Salad', 'Grilled chicken with a variety of fresh greens');

// Create instances of DishIngredients
$dishIngredient1 = new DishIngredient($dish1->DishID, $ingredient1->IngredientID, 2);
$dishIngredient2 = new DishIngredient($dish2->DishID, $ingredient2->IngredientID, 1);

// Display information
echo "Supplier: {$supplier1->SupplierName}, Location: {$supplier1->SupplierLocation}\n";
echo "Ingredient: {$ingredient1->IngredientName}, Type: {$ingredient1->IngredientType}, Price: {$ingredient1->PricePerUnit}\n";
echo "Dish: {$dish1->DishName}, Description: {$dish1->Description}\n";
echo "Dish Ingredient: DishID {$dishIngredient1->DishID}, IngredientID {$dishIngredient1->IngredientID}, Quantity: {$dishIngredient1->Quantity}\n";

?>