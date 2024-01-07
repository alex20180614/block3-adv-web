<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>
<style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

    

       

        p {
            font-size: 20px;
            color: black;
            line-height: 1.5;
        }
        .btn1 {
            display: inline-block;
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn1:hover {
            background-color: yellowgreen;
        }
    </style>
<body>
    <h1>MVC</h1>
    <a class="btn1" href="?action=showDishWithDishingredients">All Form</a>
    <a class="btn1" href="?action=showDish">Dishes</a>
    <a class="btn1" href="?action=showIngredients">Ingredients</a>
    <a class="btn1" href="?action=showDishingredients">Dishingredients</a>
    <a class="btn1" href="?action=showSuppliers">Suppliers</a>
</body>
</html>
<?php

        include_once("controllers/controller.php");
        include_once ("controllers/Ingredient.php");
        include_once ("controllers/supplier.php");
        include_once ("controllers/dishingredients.php");
        include_once 'models/supplier.php';
        include_once 'models/ingredient.php';
        include_once 'models/dishingredients.php';
        
        $connection = new ConnectionObject("localhost", "root", "", "mcv");
        $controller = new Controller($connection);
        
        $ingredientConnection = new ConnectionObject("localhost", "root", "", "mcv");
        $ingredientController = new IngredientController($ingredientConnection);

        $supplierConnection = new ConnectionObject("localhost", "root", "", "mcv");
        $supplierController = new SupplierController($supplierConnection);

        $dishingredientsConnection = new ConnectionObject("localhost", "root", "", "mcv");
        $dishingredientsController  = new DishingredientsController ($dishingredientsConnection);

        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'edit':
                $dishID = isset($_GET['dishID']) ? $_GET['dishID'] : '';
                if ($dishID) {
                    $controller->editForm($dishID);
                } else {
                    echo "<p>Error: Dish ID not provided for editing.</p>";
                }
                break;

            case 'update':
                if (isset($_POST['submit'])) {
                    $dishID = $_POST['dishID'];
                    $dishName = $_POST['dishName'];
                    $price = $_POST['price'];
                    $controller->update($dishID, $dishName, $price);
                } else {
                    echo "<p>Error: Form not submitted for update.</p>";
                }
                break;

            case 'delete':
                $dishID = isset($_GET['dishID']) ? $_GET['dishID'] : '';
                if ($dishID) {
                    $controller->deleteForm($dishID);
                } else {
                    echo "<p>Error: Dish ID not provided for deletion.</p>";
                }
                break;

            case 'confirm_delete':
                if (isset($_POST['submit'])) {
                    $dishID = $_POST['dishID'];
                    $controller->delete($dishID);
                } else {
                    echo "<p>Error: Form not submitted for deletion confirmation.</p>";
                }
                break;

            case 'showDish':
                $controller->showDish();
                break;


                case 'showDishWithDishingredients':
                    $controller->showDishWithDishingredients();
                    break;
                        case 'showIngredients':
                            $ingredientController->showIngredients();
                            break;

                            case 'showIngredientForm':
                                $ingredientController->showIngredientForm();
                                break;

                            case 'addIngredient':
                                    $ingredientController->addIngredient();
                                break;

                            case 'deleteIngredient':
                                    $ingredientID = isset($_GET['ingredientID']) ? $_GET['ingredientID'] : '';
                                    if ($ingredientID) {
                                        $ingredientController->deleteIngredient($ingredientID);
                                    } else {
                                        echo "<p>Error: Ingredient ID not provided for deletion.</p>";
                                    }
                                    break;

                                case 'confirm_deleteIngredient':
                                    $ingredientID = isset($_GET['ingredientID']) ? $_GET['ingredientID'] : '';
                                    $ingredientController->confirm_deleteIngredient($ingredientID);
                                break;

                        case 'showSuppliers':
                            $supplierController->showSuppliers();
                            break;

                            case 'showSupplierForm':
                                $supplierController->showSupplierForm();
                                break;
                                
                            case 'addSupplier':
                                    $supplierController->addSupplier();
                                break;

                            case 'deleteSupplier':
                                $supplierID = isset($_GET['supplierID']) ? $_GET['supplierID'] : '';
                                if ($supplierID) {
                                    $supplierController->deleteSupplier($supplierID);
                                } else {
                                    echo "<p>Error: Supplier ID not provided for deletion.</p>";
                                }
                                break;

                                case 'confirm_deleteSupplier':
                                    $supplierID = isset($_GET['supplierID']) ? $_GET['supplierID'] : '';
                                    $supplierController->confirm_deleteSupplier($supplierID);
                                break;

                                case 'showDishingredients':
                                    $dishingredientsController ->index();
                                    break;

                                case 'showeDishingredients':
                                    $dishingredientsController ->showeDishingredients();
                                    break;

                                    case 'createDishingredients':
                                        $dishingredientsController ->createDishingredients();
                                        break;

                                case 'deleteDishingredients':
                                    $foodVendorID = isset($_GET['foodVendorID']) ? $_GET['foodVendorID'] : '';
                                    if ($foodVendorID) {
                                        $dishingredientsController ->deleteDishingredients($foodVendorID);
                                    }else {
                                        echo "<p>Error: foodVendor ID not provided for deletion.</p>";
                                    }
                                    break;


                default:
                    if (isset($_POST['submit'])) {
                        $controller->add();
                    } else {
                        $controller->showForm();
                    }
                    break;

                }

    ?>
