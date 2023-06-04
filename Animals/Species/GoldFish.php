<?php

namespace Animals\Species;


require_once 'AbstractFish.php';


class GoldFish extends Fish
{
    // You'll notice we don't need to implement swim here because it's already defined in Fish
    // But let's say all GoldFish have a special trick. Let's add that.
    public function doTrick()
    {
        echo $this->name . " is doing a somersault!<\br>";
    }
}
