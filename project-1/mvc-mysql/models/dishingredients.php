<?php

class DishingredientsrConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class DishingredientsModel   {
    private $DishingredientsrConnectionObject;

    public function __construct($DishingredientsrConnectionObject) {
        $this->DishingredientsrConnectionObject = $DishingredientsrConnectionObject;
    }

    private function connect() {
        try {
            $mysqli = new mysqli(
                $this->DishingredientsrConnectionObject->host,
                $this->DishingredientsrConnectionObject->username,
                $this->DishingredientsrConnectionObject->password,
                $this->DishingredientsrConnectionObject->database
            );

            if ($mysqli->connect_error) {
                throw new Exception('Could not connect to the database: ' . $mysqli->connect_error);
            }

            return $mysqli;
        } catch (Exception $e) {
            error_log('Exception caught in connect method: ' . $e->getMessage());
            return false;
        }
    }

    public function getAllDishingredients() {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM dishingredients");

            if (!$result) {
                error_log("Error executing query: " . $mysqli->error);
                return false;
            }

            $results = $result->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
        } else {
            return false;
        }

        return $results ?? false;
    }

    public function selectDish() {
        $mysqli = $this->connect();
        $dishes = [];

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM dishes");

            if (!$result) {
                error_log("Error executing query: " . $mysqli->error);
                return false;
            }

            while ($row = $result->fetch_assoc()) {
                $dishes[] = $row;
            }

            $mysqli->close();
        } else {
            return false;
        }

        return $dishes;
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

    
    public function addDishingredients($dishingredientsName, $dishID, $supplierID, $ingredientID) {
    $mysqli = $this->connect();
    if ($mysqli) {
        $mysqli->query("INSERT INTO dishingredients (dishingredientsName, dishID, supplierID, ingredientID) VALUES ('$dishingredientsName', '$dishID', '$supplierID', '$ingredientID')");
            mysqli_close($mysqli);
            return true;
        } else {
            return false;
        }
    }

    public function deleteDishingredients($dishingredientsID) {
    $mysqli = $this->connect();
    if ($mysqli) {
        $result = $mysqli->query("DELETE FROM dishingredients WHERE dishingredientsID = $dishingredientsID");

            if (!$result) {
                error_log("Error deleting Dishingredients: " . $mysqli->error);
                return false;
            }
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function selectIngredients() {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM ingredients");

            if (!$result) {
                error_log('Error in selectIngredients method: ' . $mysqli->error);
                return false;
            }

            $results = $result->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

}
?>
