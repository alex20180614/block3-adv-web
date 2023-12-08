+------------------+          +------------------+
|     Suppliers    |          |   Ingredients   |
+------------------+          +------------------+
| SupplierID (PK)  |          | IngredientID (PK)|
| SupplierName     |          | IngredientName   |
| SupplierLocation |          | IngredientType   |
| ...              |          | SupplierID (FK)  |
+------------------+          | PricePerUnit     |
                             | ...              |
                             +------------------+

+------------------+          +------------------+
|      Dishes      |          | DishIngredients  |
+------------------+          +------------------+
| DishID (PK)      |          | DishID (FK)      |
| DishName         |          | IngredientID (FK)|
| Description      |          | Quantity         |
| ...              |          | ...              |
+------------------+          +------------------+



CREATE TABLE Suppliers (
    SupplierID INT PRIMARY KEY,
    SupplierName VARCHAR(255),
    SupplierLocation VARCHAR(255)
);

CREATE TABLE Ingredients (
    IngredientID INT PRIMARY KEY,
    IngredientName VARCHAR(255),
    IngredientType VARCHAR(255),
    SupplierID INT,
    PricePerUnit DECIMAL(10, 2),
    FOREIGN KEY (SupplierID) REFERENCES Suppliers(SupplierID)
);

CREATE TABLE Dishes (
    DishID INT PRIMARY KEY,
    DishName VARCHAR(255),
    Description TEXT
);

CREATE TABLE DishIngredients (
    DishID INT,
    IngredientID INT,
    Quantity INT,
    PRIMARY KEY (DishID, IngredientID),
    FOREIGN KEY (DishID) REFERENCES Dishes(DishID),
    FOREIGN KEY (IngredientID) REFERENCES Ingredients(IngredientID)
);

//add a new table with join
CREATE VIEW DishDetails AS
SELECT
    Dishes.DishID,
    Dishes.DishName,
    Dishes.Description,
    Ingredients.IngredientName,
    Ingredients.IngredientType,
    Suppliers.SupplierName
FROM
    Dishes
INNER JOIN
    DishIngredients ON Dishes.DishID = DishIngredients.DishID
INNER JOIN
    Ingredients ON DishIngredients.IngredientID = Ingredients.IngredientID
INNER JOIN
    Suppliers ON Ingredients.SupplierID = Suppliers.SupplierID;



-- Get information about dishes that contain specific types of ingredients and their suppliers -- Meat
SELECT D.DishID, D.DishName, I.IngredientName, I.IngredientType, I.PricePerUnit
FROM Dishes D
JOIN DishIngredients DI ON D.DishID = DI.DishID
JOIN Ingredients I ON DI.IngredientID = I.IngredientID
JOIN Suppliers S ON I.SupplierID = S.SupplierID
WHERE I.IngredientType = 'Meat'

UNION

-- Get information about dishes that contain specific types of ingredients and their suppliers  Vegetables
SELECT D.DishID, D.DishName, I.IngredientName, I.IngredientType, I.PricePerUnit
FROM Dishes D
JOIN DishIngredients DI ON D.DishID = DI.DishID
JOIN Ingredients I ON DI.IngredientID = I.IngredientID
JOIN Suppliers S ON I.SupplierID = S.SupplierID
WHERE I.IngredientType = 'Vegetables' LIMIT 0, 25;




| DishID | DishName | IngredientName | IngredientType | PricePerUnit |
|--------|----------|-----------------|-----------------|--------------|
| 101    | Dish1    | IngredientA     | Meat            | 5.99         |
| 101    | Dish1    | IngredientC     | Meat            | 2.99         |
| 102    | Dish2    | IngredientA     | Meat            | 5.99         |
| 102    | Dish2    | IngredientB     | Vegetables      | 3.49         |
| 103    | Dish3    | IngredientA     | Meat            | 5.99         |
| 103    | Dish3    | IngredientB     | Vegetables      | 3.49         |
