<?php

// Task #8: Abstract classes and interfaces
// Interfaces in PHP are used to define a set of methods that a class must implement.
// Here we're defining the 'InterfaceTrainable' which includes the 'train' method signature. Any class that implements this interface must define this method.

namespace Animals\Interfaces;

interface InterfaceTrainable
{
    // This is a method signature. The implementing class will provide the method's body.
    public function train(): bool;
}
