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

        // Check if the deletion action is triggered
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'deleteDish') {
            // Check if 'dishId' is set
            if (isset($_GET['dishId'])) {
                $dishId = $_GET['dishId'];

                // Perform the dish deletion
                if ($this->dishModel->deleteDish($dishId)) {
                    echo "Dish deleted successfully.";
                } else {
                    echo "Error deleting dish.";
                }
            } else {
                echo "Invalid request.";
            }
        }
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


public function addDish() {
    $dishName = $_POST['dishName'];
    $description = $_POST['description'];
    $price = $_POST['price']; 

    if ($this->dishModel->insertDish($dishName, $description, $price)) {
        echo "<div class='added-content'>";
        echo "<h2 style='color: green;'>Added dish: $dishName</h2>";

        // Display the added dish details with edit and delete buttons
        $addedDishes = $this->dishModel->selectDishes();

        if ($addedDishes !== false) {
            echo "<ul'>";

           foreach ($addedDishes as $addedDish) {
            echo "<li>";
            echo "Dish Name: " . $addedDish['DishName'] . ", Price: $" . ($addedDish['Price'] ?? 'N/A') . ", Description: " . $addedDish['Description'];
            
            // Edit button
            echo "<a style='padding:10px' href='#' class='edit-btn'>Edit</a>";

            // Delete button with onclick event to confirm deletion
            echo "<a href='#' class='delete-btn' onclick='confirmDelete({$addedDish['DishID']})'>Delete</a>";

            echo "</li>";
        }

            echo "</ul>";
        } else {
            echo "<p style='color: red;'>Error retrieving added dish details</p>";
        }

        echo "</div>";
    } else {
        echo "<p style='color: red;'>Could not add dish</p>";
    }

    $this->showDishes();
}


// controllers/controller.php

public function deleteDish($dishId) {
    if ($this->dishModel->deleteDish($dishId)) {
        echo "<p style='color: green;'>Deleted dish with ID: $dishId</p>";
    } else {
        echo "<p style='color: red;'>Could not delete dish with ID: $dishId</p>";
    }

    $this->showDishes();
}

    public function deleteDishAction($dishId) {
        if ($this->dishModel->deleteDish($dishId)) {
            echo "Dish deleted successfully.";
        } else {
            echo "Error deleting dish.";
        }
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
