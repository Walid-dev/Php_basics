<?php

namespace Animals\Species;

use Animals\Pet;

// Declare our abstract Fish class
abstract class Fish extends Pet
{
    public function swim()
    {
        echo $this->name . " is swimming...<\br> <br/>";
    }
}
