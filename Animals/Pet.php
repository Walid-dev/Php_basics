<?php

namespace Animals;

use Store\Store;

class Pet
{
    public $name;
    public $type;
    public $price;

    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;

        $store = Store::getInstance();
        $store->addPet($this);

    }

    public function introduce_pet()
    {
        echo $this->name . " is a " . $this->type . "\n";
    }

    public function eat()
    {
        echo $this->name . " is eating...", "\n";
    }

    public function play()
    {
        echo $this->name . " is playing...\n";
    }

    public function sleep()
    {
        echo $this->name . " is sleeping...\n";
    }

    public function makeSound()
    {
        echo  $this->name . " is making a sound <br/>";
    }

    public function getPrice()
    {
        return $this->price;
    }


}
