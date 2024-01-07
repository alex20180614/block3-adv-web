<?php
class DishingredientsController  {
    private $dishingredientsModel ;

    public function __construct($connection) {
        $this->dishingredientsModel  = new dishingredientsModel ($connection);
    }

    public function index() {
    $dishingredients = $this->dishingredientsModel->getAllDishingredients();
    include('views/dishingredients_form.php');
}

    public function getAllDishes() {
        return $this->dishingredientsModel ->selectDish();
    }

    public function getAllSuppliers() {
        return $this->dishingredientsModel ->selectSuppliers();
    }

    public function getAllIngredients() {
        return $this->dishingredientsModel ->selectIngredients();
    }

    public function showeDishingredients() {
        $dishes = $this->getAllDishes();
        $suppliers = $this->getAllSuppliers();
        $ingredients = $this->getAllIngredients();

        if ($dishes === false || $suppliers === false || $ingredients === false) {
            echo "Error fetching data.";
            return;
        }

        include 'views/dishingredients_add.php';
    }

    public function showDishingredients() {
        $dishingredients = $this->dishingredientsModel ->getAllDishingredients();
        include('views/dishingredients_form.php');
    }



 public function createDishingredients() {
    error_log('Entering createDishingredients method');
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dishingredientsName = $_POST['dishingredientsName'];
        $dishID = $_POST['dishID'];
        $supplierID = $_POST['supplierID'];
        $ingredientID = $_POST['ingredientID'];
        $this->dishingredientsModel->addDishingredients($dishingredientsName, $dishID, $supplierID, $ingredientID);
        $this->index();
        exit();
    } else {
        include('views/create_dishingredients.php');
    }
        error_log('Exiting createDishingredients method');

}

 public function deleteDishingredients($dishingredientsID) {
    if ($this->dishingredientsModel->deleteDishingredients($dishingredientsID)) {
        echo "<p>Dishingredients deleted successfully: $dishingredientsID</p>";
    } else {
        echo "<p>Dishingredients not found</p>";
        $this->index();
    }
}
}
?>
