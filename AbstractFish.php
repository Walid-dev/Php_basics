<?php

require_once 'Pet.php';

// Declare our abstract Fish class
abstract class Fish extends Pet
{
    public function swim()
    {
        echo $this->name . " is swimming...\n <br/>";
    }
}
