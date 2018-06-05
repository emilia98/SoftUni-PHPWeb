<?php

class Person{
    /**
     * @var string
     */
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->greet();
    }

    private function greet() :void
    {
        echo $this->name.' says "Hello"!'.PHP_EOL;
    }
}