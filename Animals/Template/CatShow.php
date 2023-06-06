<?php

namespace Animals\Template;

class CatShow extends PetShow
{
    public function execute()
    {
        echo $this->pet->getName() . " is rolling over! <br />";
    }
}
