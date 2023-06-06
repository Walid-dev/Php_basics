<?php

namespace Animals\Behaviours;

class CatSound implements SoundBehaviour
{
    public function makeSound()
    {
        echo "Meow! Meow!<br />";
    }
}
