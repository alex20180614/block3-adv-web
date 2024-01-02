<?php
include_once 'connection.php';
include_once __DIR__ . '/../models/model.php';
include_once __DIR__ . '/../models/DishModel.php';
include_once __DIR__ . '/../models/SupplierModel.php';

class Controller {
    private $supplierModel;
    private $dishModel;

    public function __construct($connection) {
        $this->supplierModel = new SupplierModel($connection);
        $this->dishModel = new DishModel($connection);
    }

    public function showSuppliers() {
        $suppliers = $this->supplierModel->selectSuppliers();
        include_once __DIR__ . '/../views/home.php';
    }

    public function showDishes() {
        $dishes = $this->dishModel->selectDishes();
        include_once __DIR__ . '/../views/dishes.php';
    }

    public function showForm() {
        $ingredients = $this->dishModel->selectIngredients();
        include_once __DIR__ . '/../views/form.php';
    }

   public function addSupplier() {
        $supplierName = $_POST['supplierName']; // Assuming you have a form field with the name 'supplierName'
        $supplierLocation = $_POST['supplierLocation']; // Assuming you have a form field with the name 'supplierLocation'

        // Validate and sanitize input data as needed

        if ($this->supplierModel->insertSupplier($supplierName, $supplierLocation)) {
            echo "<p>Added supplier: $supplierName</p>";
        } else {
            echo "<p>Could not add supplier</p>";
        }

        $this->showSuppliers();
    }

   



// controllers/controller.php

public function addDish() {
    $dishName = $_POST['dishName'];
    $description = $_POST['description'];
    $price = $_POST['price']; 

    if ($this->dishModel->insertDish($dishName, $description, $price)) {
        echo "<p>Added dish: $dishName</p>";

        // Display the added dish details
        $addedDishes = $this->dishModel->selectDishes();

        if ($addedDishes !== false) {
            echo "<h2>Added Dishes</h2>";
            foreach ($addedDishes as $addedDish) {
                echo "<p>Dish Name: " . $addedDish['DishName'] . ", Price: $" . ($addedDish['Price'] ?? 'N/A') . ", Description: " . $addedDish['Description'] . "</p>";
            }
        } else {
            echo "<p>Error retrieving added dish details</p>";
        }
    } else {
        echo "<p>Could not add dish</p>";
    }

    $this->showDishes();
}





}

$host = "localhost";
$username = "root";
$password = "";
$database = "wei_peter";
$connection2 = new ConnectionObject($host, $username, $password, $database);

$controller = new Controller($connection2);

if (isset($_POST['submit'])) {
    if (isset($_POST['dishName'])) {
        $controller->addDish();
    } else {
        $controller->addSupplier();
    }
} else {
    $controller->showForm();
}
?>
