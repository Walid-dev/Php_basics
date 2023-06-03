<?php

class Store
{
    public $pets = [];

    public function addPet($pet)
    {
        $this->pets[] = $pet;
    }

    public function sellPet($petToSell, $person)
    {
        foreach ($this->pets as $index => $pet) {
            if ($pet == $petToSell) {  // If we found the pet to sell in the store's pet list
                if ($person->buyPet($pet)) {  // If the person successfully buys the pet
                    array_splice($this->pets, $index, 1);  // We remove the pet from the store's pet list
                    echo "Sold {$pet->name} to {$person->name}!";
                }
                return;  // We can exit the function since we've handled the pet the person wanted to buy
            }
        }
        // If we reach this point, the pet wasn't in the store's pet list
        echo "Sorry, we don't have {$petToSell->name} in our store.";
    }

    // Simplier Alternative

    public function sellPetAlternative($petToSell, $person)
    {
        // Check if the pet is in the store's pet list
        $key = array_search($petToSell, $this->pets);

        // If pet is found and the person can buy the pet
        if ($key !== false && $person->buyPet($petToSell)) {
            unset($this->pets[$key]);  // Remove pet from store
            echo "Sold {$petToSell->name} to {$person->name}!";
        } else {
            echo "Sorry, either we don't have {$petToSell->name} in our store or {$person->name} can't afford it.";
        }
    }
}
