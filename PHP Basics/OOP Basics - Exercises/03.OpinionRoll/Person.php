<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}