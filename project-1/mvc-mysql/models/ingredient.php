<?php

class ModelIngredientConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class IngredientModel {
    private $ModelIngredientConnectionObject;

    public function __construct($ModelIngredientConnectionObject) {
        $this->ModelIngredientConnectionObject = $ModelIngredientConnectionObject;
    }

    private function connect() {
        try {
            $mysqli = new mysqli(
                $this->ModelIngredientConnectionObject->host,
                $this->ModelIngredientConnectionObject->username,
                $this->ModelIngredientConnectionObject->password,
                $this->ModelIngredientConnectionObject->database 
            );

            if ($mysqli->connect_error) {
                throw new Exception('Could not connect');
            }

            return $mysqli;
        } catch (Exception $e) {
            error_log($e->getMessage());
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

    public function insertIngredient($ingredientName, $IngredientType, $PricePerUnit) {
        $mysqli = $this->connect();
    
        if ($mysqli) {
            $result = $mysqli->query("INSERT INTO ingredients (`ingredientName`, `IngredientType`, `PricePerUnit`) VALUES ('$ingredientName', '$IngredientType', '$PricePerUnit')");
            mysqli_close($mysqli);
            return true;
        } else {
            return false;
        }
    }

    public function getIngredientByID($ingredientID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM ingredients WHERE ingredientID='$ingredientID'");
            $ingredient = $result->fetch_assoc();
            $mysqli->close();
            return $ingredient;
        } else {
            return false;
        }
    }

    public function deleteIngredient($ingredientID) {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("DELETE FROM ingredients WHERE ingredientID='$ingredientID'");

            if (!$result) {
                error_log('Error in deleteIngredient method: ' . $mysqli->error);
                return false;
            }

            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function confirmDeleteIngredient($ingredient) {
    include 'views/ingredient_delete.php';
}
}
?>
