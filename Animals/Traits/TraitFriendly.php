<?php

namespace Animals\Traits;

trait TraitFriendly
{
    public function wagTail()
    {
        echo $this->name . " is wagging its tail. This is going to be fun! <br/>";
    }

    public function givePaw()
    {
        echo $this->name . " is giving you its paw. How polite! <br/>";
    }
}
