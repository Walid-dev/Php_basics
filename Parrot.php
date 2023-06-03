<?php

require_once 'AbstractBird.php';


class Parrot extends AbstractBird
{
    public function __construct($name, $type, $price)
    {
        parent::__construct($name, $type, $price);
    }

    public function fly()
    {
        echo $this->name . " is flying hight in the sky <br/>";
    }

    public function makeSound()
    {
        echo $this->name . " Squawk Squawk <br/>";
    }
}
