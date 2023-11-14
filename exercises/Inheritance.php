<?php


// Write a php class called Animal with a method called makeSound(). Create a subclass called Cat that overrides the makeSound() method to bark.
class Animal {
    public function makeSound() {
        echo "Animal sound";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Miao Miao";
    }
}


    $animal = new Animal();
    $cat = new Cat();

    echo '<pre>';
    $animal->makeSound().'<br>';  
    $cat->makeSound().'<br>';
    echo '</pre>';  
// 2Write a php class called Vehicle with a method called drive(). Create a subclass called Car that overrides the drive() method to print "Repairing a car".
class Vehicle {
    public function drive() {
        echo "Driving";
    }
}

class Car extends Vehicle {
    public function drive() {
        echo "Driving a car";
    }
}

// Example usage:
    $vehicle = new Vehicle();
    $car = new Car();

    echo '<pre>';
    $vehicle->drive().'<br>';  
    $car->drive().'<br>'; 
    echo '</pre>';
// 3Write a php class called Shape with a method called getArea(). 
//Create a subclass called Rectangle that overrides the getArea() method to calculate the area of a rectangle.
class Shape {
    public function getArea() {
        echo "Calculating area";
    }
}

class Rectangle extends Shape {
    public $width;
    public $height;

    public function getArea() {
        $area = $this->width * $this->height;
        echo "Calculating area of a rectangle: $area";
    }
}

// Example usage:
$shape = new Shape();
$rectangle = new Rectangle();
$rectangle->width = 15;
$rectangle->height = 10;

 echo '<pre>';
    $shape->getArea();
    $rectangle->getArea();
 echo '<pre>';

// 4.Write a php class called Employee with methods called work() and getSalary(). Create a subclass called HRManager that overrides the work() method and adds a new method called addEmployee().
class Employee {
    protected $salary;

    public function work() {
        echo "Employee is working";
    }

    public function getSalary() {
        return $this->salary;
    }

     // Add a method to set the salary
    public function setSalary($salary) {
        $this->salary = $salary;
    }
}

class HRManager extends Employee {
    public function work() {
        echo "HR Manager is working".'<br>';
    }

    public function addEmployee() {
        echo "HR Manager is working.'<br>'";
    }
}

$employee = new Employee();
$employee->setSalary(10000);
$employee->work();
echo "Salary: " . $employee->getSalary().'<br>';

$hrManager = new HRManager();
$hrManager->setSalary(16000);
$hrManager->work();
$hrManager->addEmployee();
echo "Salary: " . $hrManager->getSalary().'<br>';

// 5.Write a php class known as "BankAccount" with methods called deposit() and withdraw(). Create a subclass called SavingsAccount that overrides the withdraw() method to prevent withdrawals if the account balance falls below one hundred.
class BankAccount {
    protected $balance = 0;

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            echo "Withdrawal successful.balance: $this->balance\n";
        } else {
            echo "Insufficient funds. Withdrawal unsuccessful.\n";
        }
    }
}

class SavingsAccount extends BankAccount {
    public function withdraw($amount) {
        // Override to prevent withdrawal if balance falls below 100
        if ($this->balance >= $amount && $this->balance - $amount >= 100) {
            $this->balance -= $amount;
            echo "Withdrawal successful. Remaining balance: $this->balance\n";
        } else {
            echo "Withdrawal unsuccessful. Balance must be at least 100 after withdrawal.\n";
        }
    }
}

$savingsAccount = new SavingsAccount();
$savingsAccount->deposit(500);
$savingsAccount->withdraw(50);

//6. Write a php class called Animal1 with a method named move(). Create a subclass called Cheetah that overrides the move() method to run.
class Animal1 {
    public function move() {
        echo "Animal is moving\n";
    }
}

class Cheetah extends Animal1 {
    public function move() {
        echo "Cheetah is running\n";
    }
}

$genericAnimal = new Animal1();
$cheetah = new Cheetah();

$genericAnimal->move();
$cheetah->move();

// 7.Write a php class known as Person with methods called getFirstName() and getLastName(). Create a subclass called Employee that adds a new method named getEmployeeId() and overrides the getLastName() method to include the employee's job title.
class Person1 {
    protected $firstName;
    protected $lastName;

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
}

class Employee1 extends Person1 {
    protected $employeeId;
    protected $jobTitle;

    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function setEmployeeId($employeeId) {
        $this->employeeId = $employeeId;
    }

    public function getLastName() {
        // Override to include job title
        return $this->lastName . ', ' . $this->jobTitle;
    }

    public function setJobTitle($jobTitle) {
        $this->jobTitle = $jobTitle;
    }
}

// Example usage:
$person1 = new Person1();
$person1->setFirstName("Alex");
$person1->setLastName("Gao");
echo "Person: {$person1->getFirstName()} {$person1->getLastName()}\n";

$employee1 = new Employee1();
$employee1->setFirstName("Lucia");
$employee1->setLastName("Smith");
$employee1->setEmployeeId("123456");
$employee1->setJobTitle("PHP");
echo "Employee: {$employee1->getFirstName()} {$employee1->getLastName()} (ID: {$employee1->getEmployeeId()})\n";



//8. Write a php class called Shape with methods called getPerimeter() and getArea(). Create a subclass called Circle that overrides the getPerimeter() and getArea() methods to calculate the area and perimeter of a circle.
class Shape1 {
    public function getPerimeter() {
        // Default implementation
        return 0;
    }

    public function getArea() {
        // Default implementation
        return 0;
    }
}

class Circle extends Shape1 {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getPerimeter() {
        // Calculate the perimeter of the circle: 2 * π * radius
        return 2 * pi() * $this->radius;
    }

    public function getArea() {
        // Calculate the area of the circle: π * radius^2
        return pi() * pow($this->radius, 2);
    }
}


$circle = new Circle(5);

echo "Circle Perimeter: {$circle->getPerimeter()}\n";
echo "Circle Area: {$circle->getArea()}\n";

//9 Write a php cehicle class hierarchy. The base class should be Vehicle, with subclasses Truck, Car and Motorcycle. Each subclass should have properties such as make, model, year, and fuel type. Implement methods for calculating fuel efficiency, distance traveled, and maximum speed.

class Vehicle1 {
    protected $make;
    protected $model;
    protected $year;
    protected $fuelType;

    // Getter methods are optional but recommended for better encapsulation
    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getYear() {
        return $this->year;
    }

    public function getFuelType() {
        return $this->fuelType;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setFuelType($fuelType) {
        $this->fuelType = $fuelType;
    }

    public function calculateFuelEfficiency() {
        // Default implementation
        return 0;
    }

    public function calculateDistanceTraveled($fuelEfficiency, $fuelAmount) {
        return $fuelEfficiency * $fuelAmount;
    }

    public function calculateMaxSpeed() {
        // Default implementation
        return 0;
    }
}

class Truck extends Vehicle1 {
    public function calculateFuelEfficiency() {
        return 4;
    }

    public function calculateMaxSpeed() {
        return 60; 
    }
}

class Car1 extends Vehicle1 {
    public function calculateFuelEfficiency() {
        return 25; 
    }

    public function calculateMaxSpeed() {
        return 100;
    }
}

class Motorcycle extends Vehicle1 {
    public function calculateFuelEfficiency() {
        return 50; 
    }

    public function calculateMaxSpeed() {
        return 120;
    }
}

// Example usage:
$truck = new Truck();
$truck->setMake("Ford");
$truck->setModel("F-150");
$truck->setYear(2022);
$truck->setFuelType("Gasoline");

echo "Truck Fuel Efficiency: {$truck->calculateFuelEfficiency()} miles per gallon\n";
echo "Truck Max Speed: {$truck->calculateMaxSpeed()} miles per hour\n";

$car = new Car1();
$car->setMake("Toyota");
$car->setModel("Camry");
$car->setYear(2022);
$car->setFuelType("Gasoline");

echo "Car Fuel Efficiency: {$car->calculateFuelEfficiency()} miles per gallon\n";
echo "Car Max Speed: {$car->calculateMaxSpeed()} miles per hour\n";

$motorcycle = new Motorcycle();
$motorcycle->setMake("Harley-Davidson");
$motorcycle->setModel("Sportster");
$motorcycle->setYear(2022);
$motorcycle->setFuelType("Gasoline");

echo "Motorcycle Fuel Efficiency: {$motorcycle->calculateFuelEfficiency()} miles per gallon\n";
echo "Motorcycle Max Speed: {$motorcycle->calculateMaxSpeed()} miles per hour\n";




// 10.Write a php ca class hierarchy for employees of a company. The base class should be Employee, with subclasses Manager, Developer, and Programmer. Each subclass should have properties such as name, address, salary, and job title. Implement methods for calculating bonuses, generating performance reports, and managing projects.


?>