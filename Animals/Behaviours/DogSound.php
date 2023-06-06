<?php

namespace Animals\Behaviours;

class DogSound implements SoundBehaviour
{
    public function makeSound()
    {
        echo "Woof! Woof!<br />";
    }
}
