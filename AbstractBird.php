<?php

require_once 'Pet.php';

abstract class AbstractBird extends Pet
{
    abstract public function fly();
}
