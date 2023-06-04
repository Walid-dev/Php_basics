<?php

namespace Store;

// Task #14: Singleton Design Pattern
// The 'Store' class follows the Singleton pattern, ensuring only a single instance exists throughout the application.
class Store
{
    private $inventory = [];
    private static $instance;

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

    public function hasPet($pet)
    {
        return in_array($pet, $this->inventory);
    }

    public function removePet($pet)
    {
        $key = array_search($pet, $this->inventory);
        if ($key !== false) {
            unset($this->inventory[$key]);
        }
    }

    public function displayInventory()
    {
        echo "Current inventory:<br />";
        foreach ($this->inventory as $pet) {
            echo "{$pet->name}, the {$pet->type}!<br />";
        }
    }
}
