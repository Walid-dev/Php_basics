<?php

namespace Animals\Species;

use Animals\Pet;

abstract class AbstractBird extends Pet
{
    abstract public function fly();
}
