<?php

namespace Animals\Traits;

// Task #11: Traits in PHP
// This is a PHP trait, which allows us to package reusable code snippets in a way that we can use in another class.
trait TraitFriendly
{
    // These methods will be available to any class that uses this trait.
    public function wagTail()
    {
        echo $this->name . " is wagging its tail. This is going to be fun! <br/>";
    }

    public function givePaw()
    {
        echo $this->name . " is giving you its paw. How polite! <br/>";
    }
}
