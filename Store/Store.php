<?php

namespace Store;

use Patterns\Observers\Subject;
use Patterns\Observers\Observer;


// Task #14: Singleton Design Pattern
// The 'Store' class follows the Singleton pattern, ensuring only a single instance exists throughout the application.
class Store implements Subject
{
    private $inventory = [];
    private static $instance;
    private static $petSoldInventory = [];

    private $observers = [];

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Store();
        }
        return self::$instance;
    }

    public function addPet($pet)
    {
        $this->inventory[] = $pet;
    }

    public static function addPetToSoldInventory($pet)
    {
        self::$petSoldInventory[] = $pet;
    }

    public function hasPet($pet)
    {
        return in_array($pet, $this->inventory);
    }

    public function removePet($pet)
    {
        $key = array_search($pet, $this->inventory);
        if ($key !== false) {
            unset($this->inventory[$key]);
            self::addPetToSoldInventory($pet);
            $this->notify();
            
        }
    }

    public function displayInventory()
    {
        echo 'Current inventory:<br />';
        foreach ($this->inventory as $pet) {
            echo "{$pet->name}, the {$pet->type}!<br />";
        }
    }

    public function displaySoldInventory()
    {
        echo 'Inventory of Sold Pets:<br />';
        foreach (self::$petSoldInventory as $pet) {
            echo "{$pet->name}, the {$pet->type}!<br />";
        }
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $this->observers = array_filter($this->observers, function ($a) use ($observer) {
            return $a !== $observer;
        });
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getObservers()
    {
        return $this->observers;
    }
}
