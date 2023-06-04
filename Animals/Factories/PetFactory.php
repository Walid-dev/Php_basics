<?php

namespace Animals\Factories;

use Animals\Pet;
use Animals\Species\Dog;
use Animals\Species\Cat;
use Animals\Species\GoldFish;
use Animals\Species\Parrot;
use Animals\Species\Eagle;

class PetFactory
{
    public static function createPet(string $type, string $name, int $price, string $breed = null, bool $isTrained = false, $isIndependant = true)
    {
        switch (strtolower($type)) {
            case 'dog':
                return new Dog($name, $type, $price, $breed, $isTrained);
            case 'cat':
                return new Cat($name, $type, $price, $breed, $isIndependant);
            case 'goldfish':
                return new GoldFish($name, $type, $price);
            case 'parrot':
                return new Parrot($name, $type, $price);
            case 'eagle':
                return new Eagle($name, $type, $price);
            default:
                return new Pet($name, $type, $price);
        }
    }
}
