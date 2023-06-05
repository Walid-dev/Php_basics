<?php

namespace Facades;

use People\Person;
use Store\Store;
use Animals\Pet;

class PetHandlingFacade
{
    private $store;

    public function __construct()
    {
        $this->store = Store::getInstance();
    }

    public function addPetToStore(Pet $pet)
    {
        $this->store->addPet($pet);
    }

    public function buyPet(Person $person, Pet $pet)
    {
        if ($this->store->hasPet($pet)) {
            $person->buyPet($pet);
            $this->store->removePet($pet);
        }
    }

    public function sellPet(Person $person, Pet $pet, Person $buyer)
    {
        $person->sellPet($pet, $buyer);
        if (!in_array($pet, $person->getPets())) {
            $this->store->addPet($pet);
        }
    }

    public function petMakeSound(Pet $pet)
    {
        $pet->makeSound();
    }
}
