<?php
class Model {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getAllSuppliers() {
        $query = "SELECT * FROM suppliers";
        $result = $this->connection->query($query);

        $suppliers = [];
        while ($row = $result->fetch_assoc()) {
            $suppliers[] = $row;
        }

        return $suppliers;
    }

    public function getAllDishes() {
        $query = "SELECT * FROM dishes";
        $result = $this->connection->query($query);

        $dishes = [];
        while ($row = $result->fetch_assoc()) {
            $dishes[] = $row;
        }

        return $dishes;
    }
}
?>

