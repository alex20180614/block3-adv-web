<?php
class DishModel {
    private $mysqli;
    private $connectionObject;

    public function __construct($connectionObject) {
        $this->connectionObject = $connectionObject;
    }

    public function connect() {
        try {
            $mysqli = new mysqli(
                $this->connectionObject->host,
                $this->connectionObject->username,
                $this->connectionObject->password,
                $this->connectionObject->database
            );

            if ($mysqli->connect_error) {
                throw new Exception('Could not connect');
            }
            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }

   public function selectIngredients() {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM ingredients");
            if ($result) {
                $ingredients = $result->fetch_all(MYSQLI_ASSOC);
                $mysqli->close();
                return $ingredients;
            } else {
                error_log('Error executing query: ' . $mysqli->error);
            }
        }
        return false;
    }


public function insertDish($dishName, $description, $price = null) {
    $mysqli = $this->connect();
    if ($mysqli) {
        try {
            $mysqli->begin_transaction();

            if ($price === null) {
                $mysqli->query("INSERT INTO Dishes (DishName, Description) VALUES ('$dishName', '$description')");
            } else {
                $mysqli->query("INSERT INTO Dishes (DishName, Description, Price) VALUES ('$dishName', '$description', $price)");
            }

            $dishId = $mysqli->insert_id;

            $mysqli->commit();
            $mysqli->close();
            return true;
        } catch (Exception $e) {
            $mysqli->rollback();
            error_log('Error inserting dish: ' . $e->getMessage());
        }
    }

    return false;
}


public function selectDishes() {
    $mysqli = $this->connect();
    if ($mysqli) {
        $result = $mysqli->query("SELECT DishID, DishName, Description, Price FROM Dishes");
        if ($result) {
            $dishes = $result->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $dishes;
        } else {
            // Handle the query error
            error_log('Error executing query: ' . $mysqli->error);
        }
    }

    return false;
}



// models/DishModel.php

public function selectDishByName($dishName) {
    $mysqli = $this->connect();
    if ($mysqli) {
        $dishName = $mysqli->real_escape_string($dishName);
        $result = $mysqli->query("SELECT DishID, DishName, Description, Price FROM Dishes WHERE DishName = '$dishName'");

        if ($result && $result->num_rows > 0) {
            $dish = $result->fetch_assoc();
            $mysqli->close();
            return $dish;
        } else {
            // Handle the query error or dish not found
            error_log('Error executing query or dish not found: ' . $mysqli->error);
        }
    }

    return false;
}




}
?>
