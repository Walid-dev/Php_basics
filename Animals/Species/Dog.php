<?php


namespace Animals\Species;


use Animals\Pet;
use Animals\Interfaces\InterfaceTrainable;
use Animals\Traits\TraitFriendly;
use Animals\Behaviours\DogSound;


class Dog extends Pet implements InterfaceTrainable
{

    use TraitFriendly;

    private $breed;
    private $isTrained = false;

    public function __construct($name, $type, $price, $breed, $isTrained = false)
    {

        parent::__construct($name, $type, $price);

        $this->breed = $breed;
        $this->isTrained = $isTrained;
        $this->setSoundBehaviour(new DogSound()); 
    }

    public function bark()
    {
        echo "{$this->name} is barking Woaf! Woaf! <br/>";
    }

    public function isTrained()
    {
        return $this->isTrained;
    }

    public function train(): bool
    {
        return $this->isTrained = true;
    }

    public function makeSound()
    {
        $this->soundBehaviour->makeSound();
    }
    

    public function play()
    {
        echo $this->name . " is playing with a ball.<br />";
    }
}
