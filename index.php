<?php

use Store\Store;
use Patterns\Factories\PetFactory;
use Animals\Behaviours\CatSound;
use Animals\Behaviours\DogSound;


require_once 'autoloader.php';

$dragon = PetFactory::createPet("Sparky", "Dragon", 5000);
$dragon->eat();
$dragon->play();
$dragon->sleep();

echo "<br /><br />";

$puppy = PetFactory::createPet("Puppy", "Labrador", 3000);
$puppy->introduce_pet();
$puppy->eat();
$puppy->play();
$puppy->sleep();

echo "<br /><br />";

$store = Store::getInstance();

$store->addPet($dragon);
$store->addPet($puppy);

$dog = PetFactory::createPet("Rex", "Dog", 300);
$cat = new \Animals\Pet("Whiskers", "Cat", 200);

$bob = new \People\Person("Bob", 10000);
$momo = new \People\Person("Momo", 34000);
$fatou = new \People\Person("Fatou", 23500);

$store->attach($bob);
$store->attach($momo);
$store->attach($fatou);

echo "Number of observers: " . count($store->getObservers()) . "</br></br>";

if ($store->hasPet($dog)) {
    $bob->buyPet($dog);
    $store->removePet($dog);
}


if ($store->hasPet($dog)) {
    $bob->buyPet($dog);
    $store->removePet($dog);
}


echo "<br /><br />";
$bob->showPets();
echo "<br /><br />";

try {
    $bob->changeMood('Excited');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo "<br /><br />";
echo ($bob->getMood());
echo "<br /><br />";

$new_dog = new \Animals\Species\Dog("Lassie", "Dog", 4000, "Berger Allemand", true);
$bob->buyPet($new_dog);
$new_dog->bark();

echo $new_dog->isTrained() ? "I'm trained!" : "I'm not trained!";

$new_cat = new \Animals\Species\Cat("Tom", "Cat", 2200, "Degoutiere", true);

echo "<br /><br />";

$bob->buyPet($new_cat);

echo "<br /><br />";
echo ($bob->showPets());
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

$store->displayInventory();
echo "<br /><br />";

$allPetsEverCreated = \Animals\Pet::getPetCount();
$listOfAllPetsEverCreated = \Animals\Pet::displayAllPets();

echo "<br /><br />";

echo "Total pets created: " . $allPetsEverCreated;

$listOfAllPetsEverCreated;

echo "<br /><br />";

// Task #17 Using Facade Design Pattern

// Initialize Facade with store
$petHandlingFacade = new Facades\PetHandlingFacade($store);

// Creating a new pet using PetFactory
$elephant = PetFactory::createPet("Dumbo", "Elephant", 15000);

// Adding the new pet to the store using the facade
$petHandlingFacade->addPetToStore($elephant);

// Buying the new pet using the facade
$petHandlingFacade->buyPet($fatou, $elephant);

// Now let's make the pet perform its unique sound
$petHandlingFacade->petMakeSound($elephant);

echo "<br /><br />";

$dogShow = new \Animals\Template\DogShow($dog);
$catShow = new \Animals\Template\CatShow($cat);

$dogShow->performTrick();
echo "<br /><br />";
$catShow->performTrick();


echo "<br /><br />";

$store->displaySoldInventory();

echo "<br /><br />";

$dog1 = new \Animals\Species\Dog("Rover", "Golden Retriever", 500, "Golden Retriever");
$cat1 = new \Animals\Species\Cat("Fluffy", "Persian Cat", 700, "Persian");

$dog1->setSoundBehaviour(new CatSound());
$cat1->setSoundBehaviour(new DogSound());

$dog1->makeSound(); // Outputs: "Fluffy: Meowwww"
$cat1->makeSound();
