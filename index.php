<?php

use Store\Store;

require_once 'Animals/Pet.php';
require_once 'Animals/Traits/TraitFriendly.php';
require_once 'Animals/Interfaces/InterfaceTrainable.php';
require_once 'Store/Store.php';
require_once 'People/Person.php';
require_once 'Animals/Species/Dog.php';
require_once 'Animals/Species/Cat.php';
require_once 'Animals/Species/GoldFish.php';
require_once 'Animals/Species/Parrot.php';
require_once 'Animals/Species/Eagle.php';



$dragon = new \Animals\Pet("Sparky", "Dragon", 5000);
$dragon->eat();
$dragon->play();
$dragon->sleep();

echo "<br /><br />";

$puppy = new \Animals\Pet("Puppy", "Labrador", 3000);
$puppy->introduce_pet();
$puppy->eat();
$puppy->play();
$puppy->sleep();

echo "<br /><br />";


$store = Store::getInstance();
$store2 = Store::getInstance();

$dog = new \Animals\Pet("Rex", "Dog", 300);
$cat = new \Animals\Pet("Whiskers", "Cat", 200);

$person = new \People\Person("Bob", 10000);

$person->buyPet($dog);
$person->buyPet($cat);

echo "<br /><br />";
$person->showPets();
echo "<br /><br />";

try {
    $person->changeMood('Excited');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo "<br /><br />";
echo ($person->getMood());
echo "<br /><br />";

$new_dog = new \Animals\Species\Dog("Lassie", "Dog", 4000, "Collie");
$person->buyPet($new_dog);
$new_dog->bark();
echo $new_dog->isTrained() ? "I'm trained!\n <br/>" : "I'm not trained!\n <br/>";

$new_cat = new \Animals\Species\Cat("Tom", "Cat", 2200, "Degoutiere");
$person->buyPet($new_cat);
echo "<br /><br />";
echo ($person->showPets());
echo "<br /><br />";
echo ($new_cat->Meow());
echo ($new_cat->Nap());

echo "<br /><br />";

$pets = [];
$pets[] = $dragon;
$pets[] = $new_cat;
$pets[] = $new_dog;


foreach ($pets as $pet) {
    $pet->makeSound();
}

echo "<br /><br />";

$goldy = new \Animals\Species\GoldFish("Goldy", "Fish", 20);
$goldy->swim();
$goldy->doTrick();
$goldy->makeSound();

echo "<br /><br />";

$parrot = new \Animals\Species\Parrot("Tropico", "Parrot", 7990);
$eagle = new \Animals\Species\Eagle("Desert", "Eagle", 8990);

$parrot->fly();
$parrot->makeSound();
$eagle->fly();
$eagle->makeSound();

echo "<br /><br />";

$new_dog->wagTail();

echo "<br /><br />";
