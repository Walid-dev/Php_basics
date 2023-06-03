<?php
// Our PHP party starts here. The "<?php" is the DJ who kicks off the music.

// Technical: We're defining a class named 'Pet', which is a blueprint for any pet that we might want to create in our application.
// Simple: We're creating a recipe for a 'Pet'. Every 'Pet' that we cook up will have the ingredients and steps listed here.
class Pet
{
    // Technical: These are properties of the Pet class. They hold data related to a Pet object. The "public" visibility keyword means these properties can be accessed anywhere, even outside the class.
    // Simple: These are like name tags for our pets. Any pet we make will have these tags, and anyone can read them because they're 'public'.
    public $name;
    public $type;
    public $price;

    // Technical: The "__construct" method is a "magic" method invoked automatically whenever a new object is created. It usually helps initialize properties.
    // Simple: This is the welcome party for any new pet. As soon as a pet enters our virtual store, it's given a name, a type, and a price.
    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }

    public function introduce_pet()
    {
        echo $this->name . " is a " . $this->type . "\n";
    }

    // Below are methods representing actions pets can perform. The echo statements simulate these actions.
    public function eat()
    {
        echo $this->name . " is eating...", "\n";
    }

    public function play()
    {
        echo $this->name . " is playing...\n";
    }

    public function sleep()
    {
        echo $this->name . " is sleeping...\n";
    }

    public function makeSound()
    {
        echo  $this->name . " is making a sound <br/>";
    }
}
