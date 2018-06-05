<?php

class Person{
    /**
     * @var string
     */
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
        echo $this->name.' says "Hello"!'."\n";
    }
}