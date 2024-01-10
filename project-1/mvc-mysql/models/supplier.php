<?php

class ModelSupplierConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class SupplierModel {
    private $ModelSupplierConnectionObject;
    //  private $mysqli;  

    public function __construct($ModelSupplierConnectionObject) {
        $this->ModelSupplierConnectionObject = $ModelSupplierConnectionObject;
        // $this->mysqli = $this->connect(); 
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
            $result = $mysqli->query("SELECT * FROM suppliers");
            // print_r($result);

            if (!$result) {
                error_log('Error in selectSuppliers method: ' . $mysqli->error);
                return false;
            }

            $results = $result->fetch_all(MYSQLI_ASSOC);
            // print_r($result);
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

   public function insertSupplier($supplierName, $supplierLocation) {
        $mysqli = $this->connect();

        if ($mysqli) {
            $mysqli->query("INSERT INTO suppliers (supplierName, supplierLocation) VALUES ('$supplierName', '$supplierLocation')");
            mysqli_close($mysqli);
            return true;
        } else {
            return false;
        }
    }

    public function getSupplierByID($supplierID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM suppliers WHERE supplierID='$supplierID'");
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
            print_r($mysqli .'11');
            $result = $mysqli->query("DELETE FROM suppliers WHERE supplierID='$supplierID'");
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
