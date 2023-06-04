<?php

// Task #6: Inheritance
// Task #8: Abstract classes and interfaces
// This file demonstrates inheritance (Task #6) and the use of abstract classes (Task #8).
// The AbstractBird class extends the Pet class, thus inheriting all its public and protected methods and properties.
// Being an abstract class, AbstractBird cannot be instantiated directly. Instead, it serves as a blueprint for subclasses.
// Any class that extends AbstractBird needs to implement the abstract method 'fly'. 

namespace Animals\Species;

use Animals\Pet;

abstract class AbstractBird extends Pet
{
    // Task #8: Abstract classes and interfaces
    // An abstract method is a method declared in an abstract class but doesn't contain any implementation.
    // The subclasses of this abstract class must provide the implementation for this method.
    abstract public function fly();
}
