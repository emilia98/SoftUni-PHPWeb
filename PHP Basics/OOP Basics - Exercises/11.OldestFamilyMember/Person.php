<?php

namespace OldestFamilyMember;
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

    static public function compare(Person $a, Person $b)
    {
        if ($a->age >= $b->age) return -1;
        if ($a->age < $b->age) return 1;
    }

    public function __toString()
    {
        return $this->name." ".$this->age.PHP_EOL;
    }
}