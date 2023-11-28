
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


?>