<?php

namespace lib\Person;

/**
 * Woman class
 */
class Woman implements PersonInterface
{
    private $name;

    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;

        $this->age = $age;
    }

    public function showName()
    {
        echo "I am Woman. My name is " .$this->name . "<br>";
    }

    public function showAge()
    {
        echo "I am Woman. My age is " .$this->name.  "<br>";
    }
}
