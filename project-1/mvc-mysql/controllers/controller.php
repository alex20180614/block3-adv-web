<?php
    include_once 'models/model.php';

    class Controller {
        private $dish;
        public function __construct($connection) {
            $this->dish = new dishModel($connection);
        }
        public function showDish() {
            $dishs = $this->dish->selectDish();
            include 'views/dish_add.php';
        }
        public function showForm() {
            include 'views/dish.php';
        }
        public function add() {
   
            $dishID = isset($_POST['dishID']) ? $_POST['dishID'] : '';
            $dishName = isset($_POST['dishName']) ? $_POST['dishName'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            if(!$dishName) {
                echo "<p>Missing information</p>";
                $this->showForm();
                return;
            } else if($this->dish->insertDish($dishName,$price)) {
                echo "<p>Added dish: $dishName successfully </p>";
            } else {
                echo "<p>Could not add dish </p>";
            }
            $this->showDish();
        }

 

    public function update($dishID, $dishName, $price) {
        if ($this->dish->updateDish($dishID, $dishName, $price)) {
            echo "<p>Updated dish: $dishName successfully </p>";
        } else {
            echo "<p>Could not update dish </p>";
        }
        $this->showDish();
    }



    public function deleteForm($dishID) {
        $dish = $this->dish->getDishByID($dishID);
    
        if ($dish) {
            include 'views/delete_dish.php';
        } else {
            echo "<p>Dish not found</p>";
        }

    }
    
    public function delete($dishID) {
        if ($this->dish->deleteDish($dishID)) {
            echo "<p>Deleted dish with ID: $dishID successfully </p>";
        } else {
            echo "<p>Could not delete dish </p>";
        }
    
        $this->showDish();
    }

public function showDishWithDishingredients() {
    $dishesWithDishingredients = $this->dish->JoinDishesWith();
    include 'views/jointable.php'; 
}


       
    public function editForm($dishID) {
                
        $dish = $this->dish->getDishByID($dishID);

        if ($dish) {
            include 'views/dish.php'; 
        } else {
            echo "<p>Dish not found</p>";
        }
    }

    }

?>

