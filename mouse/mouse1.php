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
        echo "Mouse clicked!" .'<br>';
    }

    public function doubleClick()
    {
        echo "Mouse double-clicked!".'<br>';
    }

    public function isAffordable()
    {
        return $this->price < 100;
    }
}


$mouse1 = new Mouse("Logitech", "MX Master 3", 7, 99.99);
$mouse2 = new Mouse("Razer", "DeathAdder Elite", 6, 69.99);

//
$mouse1->click();
$mouse2->doubleClick();

function checkAffordability($mouse)
{
    if ($mouse->isAffordable()) {
        echo $mouse->getBrand() . " " . $mouse->getModel() . " is affordable!<br>";
    } else {
        echo $mouse->getBrand() . " " . $mouse->getModel() . " is a bit pricey!<br>";
    }
}

checkAffordability($mouse1). '<br>';

checkAffordability($mouse2);
?>