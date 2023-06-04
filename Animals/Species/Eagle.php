<?php

// Task #6: Inheritance
// Task #8: Abstract classes and interfaces
// This file demonstrates Inheritance (Task #6) and Abstract classes (Task #8).
// The Eagle class extends the AbstractBird class, therefore, it inherits all its public and protected methods and properties.
// It must implement the abstract method 'fly' from the AbstractBird class.
// This file also shows how the constructor of the parent class can be called using the 'parent' keyword.

namespace Animals\Species;

class Eagle extends AbstractBird
{
    // Task #2: Basic principles of classes and objects
    // Here we have a constructor method. When an object is created from this class, this method will automatically be called.
    // This constructor calls the constructor of the parent class (AbstractBird) to initialize inherited properties.
    public function __construct($name, $type, $price)
    {
        parent::__construct($name, $type, $price);
    }

    // Task #8: Abstract classes and interfaces
    // The 'fly' method was declared abstract in AbstractBird class, so we must provide an implementation here.
    // This demonstrates how classes that inherit from an abstract class are forced to implement its abstract methods.
    public function fly()
    {
        echo $this->name . " is soaring through the sky";
    }

    // Task #2: Basic principles of classes and objects
    // This is a method of the Eagle class. It allows an Eagle object to make a sound.
    public function makeSound()
    {
        echo $this->name . " Screech!";
    }
}
