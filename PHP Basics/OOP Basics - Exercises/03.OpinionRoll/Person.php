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

    public function getAge() :int
    {
        return $this->age;
    }

    public function getName() :string
    {
        return $this->name;
    }
}