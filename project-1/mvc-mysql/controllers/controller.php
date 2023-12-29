<?php
include_once 'models/model.php';

class Controller {
    private $supplierModel;

    public function __construct($connection) {
        $this->supplierModel = new SupplierModel($connection);
    }

    public function showSuppliers() {
        $suppliers = $this->supplierModel->selectSuppliers();
        include 'views/home.php';
    }

    public function showForm() {
        include 'views/form.php';
    }

    public function addSupplier() {
        $name = $_POST['name'];
        $location = $_POST['location'];

        if (!$name || !$location) {
            echo "<p>Missing information</p>";
            $this->showForm();
            return;
        } else if($this->supplierModel->insertSupplier($name, $location)){
            echo "<p>Added supplier: $name, $location</p>";
        } else {
            echo "<p>Could not add supplier</p>";
        }
        $this->showSuppliers();
    }
}

include_once 'controllers/connection.php';
$connection2 = new connectionObject($host, $username, $password, $database);
$controller = new Controller($connection2);

if(isset($_POST['submit'])) {
    $controller->addSupplier();
} else {
    $controller->showForm();
}
?>
