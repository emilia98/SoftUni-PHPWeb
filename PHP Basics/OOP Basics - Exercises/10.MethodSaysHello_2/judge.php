<?php

class Person{
    private $name;

    public function getName() :string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function greet()
    {
        echo $this->name.' says "Hello"!';
    }
}

$name = trim(fgets(STDIN));
$person = new Person();
$person->setName($name);
$person->greet();
?>