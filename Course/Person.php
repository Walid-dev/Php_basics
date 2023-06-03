<?php

declare(strict_types=1);  // This enforces strict data type checks for function arguments and return values.

class Person
{
    // The "protected" keyword indicates these properties can be accessed within the class and by any classes that inherit from this class.
    // This contrasts with "private" (only accessible within the class itself) and "public" (accessible from any scope).
    protected $age;
    protected $name = 'Joe Smith';

    // The "public" keyword indicates this property can be accessed from any scope. 
    // The "static" keyword means this property is shared across all instances of this class. So changing this property in one instance changes it in all instances.
    public static $instance;

    // "__construct" is a magic method in PHP, automatically called when a new instance of this class is created.
    protected function __construct(int $age, string $name = 'Joe Smith')
    {
        $this->age = $age;  // The "$this" keyword refers to the current object instance.
        $this->name = $name;
    }

    // A static method can be called on the class itself, not just on an instance. Here, it implements the singleton design pattern (ensuring only a single instance of this class exists at a time).
    public static function getInstance(int $age, string $name): Person
    {
        echo 'Person::getInstance called', "\n";

        // If an instance of this class doesn't already exist, one is created.
        if (!self::$instance) {
            self::$instance = new self($age, $name);
        }

        // Return the existing instance.
        return self::$instance;
    }

    // "getAge" and "getName" are getter methods, used to access the property values from outside the class.
    public function getAge(): int
    {
        return $this->age;
    }

    // "setAge" and "setName" are setter methods, used to modify the property values from outside the class.
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // A public method that can be called from any scope.
    public function sayHello(): string
    {
        return 'Hello ' . $this->getName();
    }
}

// Inheritance: Developer is a subclass of Person and inherits all of its protected and public properties and methods.
class Developer extends Person
{
    // A separate instance variable to maintain the singleton property within the Developer class.
    public static $instance_developer;

    // This static method overrides the parent's method to provide Developer-specific functionality.
    public static function getInstance(int $age, string $name): Person
    {
        echo 'Developer::getInstance called', "\n";

        // If an instance of this class doesn't already exist, one is created.
        if (!self::$instance_developer) {
            self::$instance_developer = new Developer($age, $name);
        }

        // Return the existing instance.
        return self::$instance_developer;
    }

    // This method overrides the parent's sayHello method to provide a Developer-specific greeting.
    public function sayHello(): string
    {
        return 'Hello Developer ' . $this->getName();
    }
}

// The Engineer class extends Developer, inheriting all of its protected and public properties and methods.
class Engineer extends Developer
{

    // This method extends the parent's sayHello method by adding additional information to the greeting.
    public function sayHello(): string
    {
        return parent::sayHello() . ' Engineer';
    }
}

// Create an Engineer instance named Walid.
$walid = Engineer::getInstance(30, 'Walid');

// Create a Developer instance named Abdullah.
$abdullah = Developer::getInstance(30, 'Abdullah');

// Create a Person instance named Alex.
$alex = Person::getInstance(30, 'Alex');

// Print the names of the instances.
echo $walid->getName(), "\n";  // Outputs "Walid"
echo $abdullah->getName(), "\n";  // Outputs "Abdullah"
echo $alex->getName(), "\n";  // Outputs "Alex"


// This code covers concepts such as data types, classes, inheritance, encapsulation, properties, methods, 
// visibility (public, protected, private), the "$this" keyword, static properties and methods, and the singleton design pattern.