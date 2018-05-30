<?php

class Pokemon
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $element;
    /**
     * @var int
     */
    public $health;

    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }
}