<?php

class SupplierModel {
    private $mysqli;
    private $connectionObject;

    public function __construct($connectionObject) {
        $this->connectionObject = $connectionObject;
    }

    public function selectSuppliers() {
        // Your code to select suppliers from the database
    }

    public function insertSupplier($name, $location) {
        $mysqli = $this->connect();
        if ($mysqli) {
            try {
                $mysqli->begin_transaction();

                $mysqli->query("INSERT INTO suppliers (SupplierName, SupplierLocation) VALUES ('$name', '$location')");
                // Assuming 'suppliers' is the correct table name

                $mysqli->commit();
                $mysqli->close();
                return true;
            } catch (Exception $e) {
                $mysqli->rollback();
                error_log('Error inserting supplier: ' . $e->getMessage());
            }
        }

        return false;
    }

}
