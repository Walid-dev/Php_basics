<?php


namespace Animals\Species;


use Animals\Pet;
use Animals\Interfaces\InterfaceTrainable;
use Animals\Traits\TraitFriendly;


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
        echo $this->name . ": Woof! Woof! <br/>";
    }

    public function play()
    {
        echo $this->name . " is playing with a ball.<br />";
    }
}
