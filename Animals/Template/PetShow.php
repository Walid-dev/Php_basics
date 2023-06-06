<?php

namespace Animals\Template;

use Animals\Pet;

abstract class PetShow
{
    protected $pet;

    public function __construct(Pet $pet)
    {
        $this->pet = $pet;
    }

    public function performTrick()
    {
        $this->prepare();
        $this->execute();
        $this->celebrate();
    }

    public function prepare()
    {
        echo $this->pet->getName() . " is getting ready. <br />";
    }

    abstract public function execute();

    public function celebrate()
    {
        echo $this->pet->getName() . " did it! Celebrations! <br />";
    }
}
