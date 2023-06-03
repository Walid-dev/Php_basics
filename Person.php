<?php

class Person
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
        if ($this->money >= $pet->price) {
            $this->pets[] = $pet;
            $this->money -= $pet->price;

            echo "{$this->name} has successfully bought {$pet->name}! <br/>";
            $this->changeMood("Happy");
            return true;
        } else {
            $this->changeMood("Sad");
            echo "Sorry, {$this->name} can't afford {$pet->name}. <br/>";
            return false;
        }
    }

    public function showPets()
    {
        echo "Meet {$this->name}'s pets:<br />";
        foreach ($this->pets as $pet) {
            echo "{$pet->name}, the {$pet->type}!<br />";
        }
    }

    public function sellPet(Pet $petToSell, Person $buyer)
    {
        // Check if the person has the pet they try to sell
        $key = array_search($petToSell, $this->pets);

        // If pet is found so the person can sell the pet
        if ($key !== false) {
            if ($buyer->buyPet($petToSell)) { // checks if the buyer can buy the pet
                unset($this->pets[$key]); // If buyer can buy the pet, then remove it from the seller's pets list
                $this->changeMood("Happy");
                echo "Sold {$petToSell->name} to {$buyer->name}! <br/>";
            } else {
                echo "{$buyer->name} doesn't have enough money to buy {$petToSell->name}.<br />";
                $this->changeMood("Sad");
            }
        } else {
            echo "{$this->name} doesn't own {$petToSell->name}.<br />";
        }
    }


    public function changeMood($mood)
    {
        $validMoods = ['Happy', 'Sad', 'Neutral'];
        if (in_array($mood, $validMoods)) {
            $this->mood = $mood;
        } else {
            throw new InvalidArgumentException("Invalid mood state.");
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
