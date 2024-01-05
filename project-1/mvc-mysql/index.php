<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'controllers/controller.php';
include_once './models/model.php';
include_once './models/DishModel.php';

$host = "localhost";
$username = "root";
$password = "";
$database = "wei_peter";

$connection2 = new ConnectionObject($host, $username, $password, $database);

$controller = new Controller($connection2);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'showSuppliers':
        $controller->showSuppliers();
        break;
    case 'showDishes':
        $controller->showDishes();
        break;
    case 'showForm':
        $controller->showForm();
        break;
    case 'deleteDish':
        // Handle the deletion action
        if (isset($_GET['dishId'])) {
            $dishId = $_GET['dishId'];
            $controller->deleteDish($dishId);
        }
        break;
    case 'showEditForm':
    if (isset($_GET['dishId'])) {
        $dishId = $_GET['dishId'];
        $controller->showEditForm($dishId);
    } else {
        echo "Invalid request.";
    }
    case 'editDish':
    $controller->editDish();
    break;
    break;  
    default:
        // Handle other actions or display a default page
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>MVC with mySQL</h1> -->

    <!-- Display navigation links or buttons -->
    <ul>
        <!-- <li><a href="index.php?action=showSuppliers">Show Suppliers</a></li> -->
        <li><a href="index.php?action=showDishes">Show Dishes</a></li>
        <li><a href="index.php?action=showForm">Add/Edit Dish</a></li>
    </ul>
</body>
</html>
