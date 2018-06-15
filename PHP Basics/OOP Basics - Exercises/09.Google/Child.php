<?php

class Child
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $birthday;

    public function __construct(string $name, string $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function __toString()
    {
        return $this->name." ".$this->birthday.PHP_EOL;
    }
}