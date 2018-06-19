<?php

namespace OldestFamilyMember_2
class Person {
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }
}