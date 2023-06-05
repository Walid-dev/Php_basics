<?php

namespace People;

use Animals\Pet;
use Patterns\Observers\Observer;
use Store\Store;

class Person implements Observer
{
    private $name;
    private $money;
    private $mood;
    private $pets = [];

    public function __construct($name, $money)
    {
        $this->name = $name;
        $this->money = $money;
        $this->mood = "Neutral";
    }

    public function buyPet(Pet $pet)
    {
        if ($this->money >= $pet->getPrice()) {
            $this->pets[] = $pet;
            $this->money -= $pet->getPrice();
            echo "{$this->name} has successfully bought {$pet->name}! <br/>";
            $this->changeMood("Happy");
            return true;
        } else {
            $this->changeMood("Sad");
            echo "Sorry, {$this->name} can't afford {$pet->name}. <br/>";
            return false;
        }
    }

    public function sellPet(Pet $pet, Person $buyer)
    {
        if (($key = array_search($pet, $this->pets)) !== false) {
            unset($this->pets[$key]);
            return $buyer->buyPet($pet);
        }
        return false;
    }

    public function update(\Patterns\Observers\Subject $subject)
    {
        echo $this->name . ", a pet was just sold! Check out our other pets on sale!</br>";
    }    

    public function showPets()
    {
        echo "Meet {$this->name}'s pets:<br />";
        foreach ($this->pets as $pet) {
            echo "{$pet->name}, the {$pet->type}!<br />";
        }
    }

    public function changeMood($mood)
    {
        $validMoods = ['Happy', 'Sad', 'Neutral'];
        if (in_array($mood, $validMoods)) {
            $this->mood = $mood;
        } else {
            throw new \InvalidArgumentException("Invalid mood state.");
        }
    }

    public function getMood()
    {
        return $this->mood;
    }

    public function getPets()
    {
        return $this->pets;
    }

    public function getMoney()
    {
        return $this->money;
    }
}
