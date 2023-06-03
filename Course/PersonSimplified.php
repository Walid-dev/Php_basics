<?php

// This line makes sure we're strict about our data types. It's like telling a calculator to stop if someone types in a letter instead of a number.
declare(strict_types=1);

use Mobi2Go\Persistence\Database;

interface Human
{
    public function getAge(): int;
    public function setAge(int $age): void;
    public function getName(): string;
    public function setName(string $name): void;
    public function sayHello(): string;
}

trait CanProgram
{
    public function program()
    {
        echo "I'm programming";
    }
}

abstract class Person implements Human
{
    // Think of "protected" as a security level for the 'age' and 'name' data we're storing. It's like a "staff only" door at a business.
    protected $age;
    protected $name = 'Joe Smith';

    // When we create a new person, this function runs. It's like a blueprint telling us what details we need (in this case, age and name).
    public function __construct(int $age, string $name = 'Joe Smith')
    {
        $this->age = $age;
        $this->name = $name;
    }

    // These functions allow us to get or change the name and age of our person. It's like asking them their name, or telling them to legally change it.
    public function getAge(): int
    {
        // do anything before we return age...

        return $this->age;
    }
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // This function lets our person say hello. It's like teaching them a phrase to say when they meet someone.
    public function sayHello(): string
    {
        return 'Hello ' . $this->getName();
    }

    public function getAllPeoples()
    {
        $peoples = Database::query('SELECT * FROM peoples');
    }

    abstract public function sayGoodbye(): void;
}

// A 'Developer' is a type of 'Person', so it shares many of the same functions and properties, but we can also add new ones or change existing ones.
class Developer extends Person
{
    use CanProgram;

    public function sayHello(): string
    {
        return 'Hello Developer ' . $this->getName();
    }

    public function sayGoodbye(): void
    {
        echo 'Goodbye';
    }
}

// An 'Engineer' is a type of 'Developer', so it inherits everything from 'Developer' and 'Person', but again, we can add or change functions and properties.
class Engineer extends Person
{
    use CanProgram;

    public function sayHello(): string
    {
        return parent::sayHello() . ' Engineer';
    }

    public function sayGoodbye(): void
    {
        echo 'Goodbye';
    }
}

class PersonRepository
{
    /**
     * @return Human[]
     */
    public static function getPeople(): array
    {
        return [
            new Engineer(33, 'Walid'),
            new Developer(33, 'Abdullah'),
        ];
    }
}

$people = PersonRepository::getPeople();

foreach ($people as $person) {
    echo $person->sayHello(), "\n";
    $person->sayGoodbye();
}


// Now we're creating some people! We make an 'Engineer' named Walid, a 'Developer' named Abdullah, and a 'Person' named Alex.


// Finally, we're asking each person to tell us their name.


// First, Walid the Engineer comes to the party. When he arrives, he goes to the table with name tags for Developers, because there aren't any for Engineers. He picks up a blank name tag, writes "Walid" on it, and puts it on.
// Later, Abdullah the Developer comes to the party. He also goes to the table with name tags for Developers. He finds that there's only one name tag left, and it already has "Walid" written on it. But, because of the party's rules, he has to wear a name tag. So, he puts on the "Walid" name tag, even though his name is Abdullah.
// Then, Alex the Person comes to the party. He goes to a separate table with name tags for Persons. He picks up a blank name tag, writes "Alex" on it, and puts it on.
// Now, when you ask each of them their name (according to their name tag), Walid and Abdullah will both say "Walid" because they are wearing the same name tag. Alex will say "Alex", because he got his name tag from a different table.
// The name tags represent the "instance" in our PHP code. The rules of the party represent the Singleton pattern, which says there can only be one name tag (or instance) per table (or class).
