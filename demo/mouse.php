<?php

ini_set('display_errors', 1);

class Mouse
{
    private $brand;
    private $model;
    private $buttons;
    private $price;

    public function __construct($brand, $model, $buttons, $price)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->buttons = $buttons;
        $this->price = $price;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function click()
    {
        echo "Mouse clicked!";
    }

    public function doubleClick()
    {
        echo "Mouse double-clicked!";
    }
}

// Create instances of the Mouse class
$mouse1 = new Mouse("Logitech", "MX Master 3", 7, 99.99);
echo "Mouse 1: " . $mouse1->getBrand() . " " . $mouse1->getModel() . "<br>";
echo "Buttons: " . $mouse1->getButtons() . "<br>";
echo "Price: $" . $mouse1->getPrice() . "<br>";

$mouse2 = new Mouse("Razer", "DeathAdder Elite", 6, 69.99);
echo "Mouse 2: " . $mouse2->getBrand() . " " . $mouse2->getModel() . "<br>";
echo "Buttons: " . $mouse2->getButtons() . "<br>";
echo "Price: $" . $mouse2->getPrice() . "<br>";

// Perform mouse actions
$mouse1->click();
echo "<br>";
$mouse2->doubleClick();
?>
