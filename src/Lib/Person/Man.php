<?php

namespace lib\Person;

/**
 * Man class
 */
class Man implements PersonInterface
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
        echo "I am man. My name is " .$this->name . "<br>";
    }

    public function showAge()
    {
        echo "I am man. My name is " .$this->name .  "<br>";
    }
}
