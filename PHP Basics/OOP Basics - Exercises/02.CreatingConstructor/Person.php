<?php

class Person
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;

        echo $this->name . " " . $this->age;
    }
}
