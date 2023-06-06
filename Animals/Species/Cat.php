<?php

namespace Animals\Species;

use Animals\Pet;
use Animals\Behaviours\CatSound;

class Cat extends Pet
{

    private $breed;
    private $isIndependent = true;

    public function __construct($name, $type, $price, $breed, $isIndependent = true)
    {
        parent::__construct($name, $type, $price);

        $this->breed = $breed;
        $this->isIndependent = $isIndependent;

        $this->setSoundBehaviour(new CatSound());
        
    }

    public function Meow()
    {
        echo "{$this->name} is Meowing  <br/>";
    }

    public function Nap()
    {
        echo "{$this->name} is napping Zzz <br/>";
    }

    public function IsIndependent()
    {
        return $this->isIndependent;
    }

    public function makeSound()
    {
        echo $this->name . ": Meowww <br/>";
    }
}
