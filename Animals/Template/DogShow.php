<?php

namespace Animals\Template;

use Animals\Template\PetShow;

class DogShow extends PetShow
{
    public function execute()
    {
        echo $this->pet->getName() . " is doing a flip! <br />";
    }
}
