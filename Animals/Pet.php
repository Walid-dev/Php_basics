<?php

namespace Animals;

use Store\Store;

class Pet
{
    public $name;
    public $type;
    public $price;

    // Keep track of the total number of pets created
    private static $petCount = 0;

    // Keep a list of all pets created
    private static $allPets = [];

    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;

        // When a pet is created, increment the count and add it to the list
        self::$petCount++;
        self::$allPets[] = $this;

        // Also add the pet to the store
        $store = Store::getInstance();
        $store->addPet($this);
    }

    // Get the total number of pets ever created
    public static function getPetCount()
    {
        return self::$petCount;
    }

    // Display all pets ever created
    public static function displayAllPets()
    {
        echo "All pets ever created: </br>";
        foreach (self::$allPets as $pet) {
            echo $pet->name . ", the " . $pet->type . "</br>";
        }
    }

    // Various behaviors of the pet
    public function introduce_pet()
    {
        echo $this->name . " is a " . $this->type . "</br>";
    }

    public function eat()
    {
        echo $this->name . " is eating...", "</br>";
    }

    public function play()
    {
        echo $this->name . " is playing...</br>";
    }

    public function sleep()
    {
        echo $this->name . " is sleeping...</br>";
    }

    public function makeSound()
    {
        echo  $this->name . " is making a sound <br/>";
    }

    // Get the price of the pet
    public function getPrice()
    {
        return $this->price;
    }
}
