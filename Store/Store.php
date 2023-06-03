<?php

namespace Store;

use Animals\Pet;

class Store
{
    private static $instance;
    private $pets = [];

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function addPet($pet)
    {
        $this->pets[] = $pet;
    }

    public function getPetsCount()
    {
        return count($this->pets);
    }

    public function sellPet($petToSell, $person)
    {
        foreach ($this->pets as $index => $pet) {
            if ($pet === $petToSell) {
                if ($person->buyPet($pet)) {
                    unset($this->pets[$index]);
                    echo "Sold {$pet->name} to {$person->name}!";
                }
                return;
            }
        }

        echo "Sorry, we don't have {$petToSell->name} in our store.";
    }
}
