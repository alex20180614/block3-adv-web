<?php

class ModelSupplierConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class SupplierModel {
    private $ModelSupplierConnectionObject;

    public function __construct($ModelSupplierConnectionObject) {
        $this->ModelSupplierConnectionObject = $ModelSupplierConnectionObject;
    }

    private function connect() {
        try {
            $mysqli = new mysqli(
                $this->ModelSupplierConnectionObject->host,
                $this->ModelSupplierConnectionObject->username,
                $this->ModelSupplierConnectionObject->password,
                $this->ModelSupplierConnectionObject->database
            );

            if ($mysqli->connect_error) {
                throw new Exception('Could not connect : ' . $mysqli->connect_error);
            }

            return $mysqli;
        } catch (Exception $e) {
            error_log('Exception caught in connect method: ' . $e->getMessage());
            return false;
        }
    }

    public function selectSuppliers() {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM sppliers");

            if (!$result) {
                error_log('Error in selectSuppliers method: ' . $mysqli->error);
                return false;
            }

            $results = $result->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

    public function insertSupplier($supplierName, $supplierLocation) {
        $mysqli = $this->connect();

        if ($mysqli) {
            $mysqli->query("INSERT INTO sppliers (supplierName, supplierLocation) VALUES ('$supplierName', '$supplierLocation')");
            mysqli_close($mysqli);
            return true;
        } else {
            return false;
        }
    }

    public function getSupplierByID($supplierID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM sppliers WHERE supplierID='$supplierID'");
            $supplier = $result->fetch_assoc();
            $mysqli->close();
            return $supplier;
        } else {
            return false;
        }
    }

    public function deleteSupplier($supplierID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("DELETE FROM sppliers WHERE supplierID='$supplierID'");
            if (!$result) {
                error_log("Error deleting supplier: " . $mysqli->error);
                return false;
            }
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }

}

?>
