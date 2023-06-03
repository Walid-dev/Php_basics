<?php
// Task #1


// We're telling PHP, "Hey, remember that 'Pet' recipe? We need that!"
require_once 'Pet.php';
require_once 'Person.php';
require_once 'Store.php';
require_once 'Dog.php';
require_once 'Cat.php';
require_once 'GoldFish.php';
require_once 'Parrot.php';
require_once 'Eagle.php';





// Technical: We're creating an object of the 'Pet' class and passing in values for the required properties.
// Simple: We're making a new pet! A dragon named Sparky, who costs $5000. Expensive? Yes. Worth it? Definitely.
$dragon = new Pet("Sparky", "Dragon", 5000);

// Let's see our dragon in action!
$dragon->eat();
$dragon->play();
$dragon->sleep();

// Task #2

echo "<br /><br />";

$puppy = new Pet("Puppy", "Labrador", 3000);

$puppy->introduce_pet();
$puppy->eat();
$puppy->play();
$puppy->sleep();

echo "<br /><br />";

// Task #3

$store = new Store();
$dog = new Pet("Rex", "Dog", 300);
$cat = new Pet("Whiskers", "Cat", 200);

$store->addPet($dog);
$store->addPet($cat);

$person = new Person("Bob", 10000);
$dog = new Pet("Rex", "Dog", 900);
$cat = new Pet("Whiskers", "Cat", 1700);

$person->buyPet($dog);
$person->buyPet($cat);

echo "<br /><br />";

$person->showPets();

echo "<br /><br />#5 Encapsulation and Method Chaining:<br />";

echo "<br /><br />#6 Refactoring for Better Encapsulation and Exception Handling:<br />";


try {
    $person->changeMood('Excited');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo "<br /><br />";

echo ($person->getMood());


echo "<br /><br />#5 Inheritance:<br />";


$new_dog = new Dog("Lassie", "Dog", 4000, "Collie");
$person->buyPet($new_dog);

$new_dog->bark();
echo $new_dog->isTrained() ? "I'm trained!\n <br/>" : "I'm not trained!\n <br/>";

$new_cat = new Cat("Tom", "Cat", 2200, "Degoutiere");
$person->buyPet($new_cat);

echo "<br /><br />";

echo ($person->showPets());

echo "<br /><br />";

echo ($new_cat->Meow());
echo ($new_cat->Nap());

echo "<br /><br />#7 Polymorphism in Php:<br />";

$pets = [];

$pets[] = $dragon;
$pets[] = $new_cat;
$pets[] = $new_dog;


foreach ($pets as $pet) {
    $pet->makeSound();
}

echo "<br /><br />#8 Abstract Classes and Interfaces:<br />";


// Abstract class: Let's create a GoldFish object and see it in action
$goldy = new GoldFish("Goldy", "Fish", 20);
$goldy->swim();  // This method comes from the abstract Fish class
$goldy->doTrick(); // This method is specific to the GoldFish class
$goldy->makeSound(); // This method comes frm the Fish class


$parrot = new Parrot("Tropico", "Parrot", 7990);
$eagle = new Eagle("Desert", "Eagle", 8990);

$parrot->fly();
$parrot->makeSound();

$eagle->fly();
$eagle->makeSound();

echo "<br /><br />#9 Traits in Php:<br />";

// Task #9: Traits in Php

$new_dog->wagTail();
