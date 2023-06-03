<?php

namespace Animals\Species;

class Eagle extends AbstractBird
{

    public function __construct($name, $type, $price)
    {
        parent::__construct($name, $type, $price);
    }

    public function fly()
    {
        echo $this->name . " is soaring through the sky";
    }

    public function makeSound()
    {
        echo $this->name . " Screech!";
    }
}
