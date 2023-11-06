| Syntax    | Description |
| --------- | ----------- |
| Header    | Title       |
| Paragraph | Text        |
| Syntax    | Description |
| --------- | ----------- |
| Header    | Title       |
| Paragraph | Text        |

## Employees Table

| employeeID | name  | dept          |
| ---------- | ----- | ------------- |
| 1          | Peter | pumpkin eater |

## Departments Table:

departmentID departmentName
1 pumpkin eater

<!-- SQL syntax -->

-- creare Employees table
CREATE TABLE Employees (
employeeID INT PRIMARY KEY,
name VARCHAR(255),
deptID INT,
FOREIGN KEY (deptID) REFERENCES Departments(departmentID)
);

-- create Department table
CREATE TABLE Departments (
departmentID INT PRIMARY KEY,
departmentName VARCHAR(255)
);
