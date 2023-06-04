<?php

// Task #10: Autoloading classes in PHP
// 'require_once' is used to include PHP files. These are the classes that will be needed to run the script.

use Store\Store;
use Animals\Factories\PetFactory;

require_once 'Animals/Pet.php';
require_once 'Animals/Factories/PetFactory.php';
require_once 'Animals/Traits/TraitFriendly.php';
require_once 'Animals/Interfaces/InterfaceTrainable.php';
require_once 'Store/Store.php';
require_once 'People/Person.php';
require_once 'Animals/Species/Dog.php';
require_once 'Animals/Species/Cat.php';
require_once 'Animals/Species/GoldFish.php';
require_once 'Animals/Species/Parrot.php'; 
require_once 'Animals/Species/Eagle.php';

// Task #2: Basic principles of classes and objects
// Here, we create new instances of the 'Pet' class.

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

// Task #14: Singleton Design Pattern
// The 'Store' class uses the Singleton pattern. When we call 'getInstance', we're ensuring that there is only one instance of 'Store' in the application.

$store = Store::getInstance();
$store2 = Store::getInstance();

// Task #1: Understanding PHP OOP fundamentals
// Here, we create new instances of the 'Pet' and 'Person' classes. These instances are also known as objects.

$dog = PetFactory::createPet("Rex", "Dog", 300);
$cat = new \Animals\Pet("Whiskers", "Cat", 200);

$person = new \People\Person("Bob", 10000);

// Task #3: Composition & Task #4: Encapsulation and method chaining
// The 'buyPet' method modifies the state of the 'Person' object, adding the pet to the person's array of pets and subtracting the cost of the pet from the person's money.

$person->buyPet($dog);
$person->buyPet($cat);

echo "<br /><br />";
$person->showPets();
echo "<br /><br />";

// Task #13: Error handling in PHP OOP
// Here we handle an exception which could be thrown if an invalid mood is passed to the 'changeMood' method.

try {
    $person->changeMood('Excited');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo "<br /><br />";
echo ($person->getMood());
echo "<br /><br />";

// Task #6: Inheritance
// We instantiate objects of classes that inherit from the 'Pet' class.

$new_dog = new \Animals\Species\Dog("Lassie", "Dog", 4000, "Berger Allemand", true);
$person->buyPet($new_dog);
$new_dog->bark();

// Task #8: Abstract classes and interfaces
// The 'isTrained' method is part of the 'InterfaceTrainable' interface which the 'Dog' class implements.

echo $new_dog->isTrained() ? "I'm trained!\n <br/>" : "I'm not trained!\n <br/>";

$new_cat = new \Animals\Species\Cat("Tom", "Cat", 2200, "Degoutiere", true);
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

// Task #7: Polymorphism
// Each pet may make a different sound due to the 'makeSound' method being overridden in the child classes.

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

// Task #11: Traits in PHP
// The 'wagTail' method is part of the 'TraitFriendly' trait used by the 'Dog' class.

$new_dog->wagTail();

echo "<br /><br />";

$store->displayInventory();
echo "<br /><br />";

// Task #12: Static properties and methods in PHP
// Static methods can be called directly on the class itself rather than an instance of the class.

$allPetsEverCreated = \Animals\Pet::getPetCount();
$listOfAllPetsEverCreated = \Animals\Pet::displayAllPets();

echo "<br /><br />";

echo "Total pets created: " . $allPetsEverCreated . "\n";
$listOfAllPetsEverCreated;
