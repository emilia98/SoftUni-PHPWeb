<?php

require_once ("Pokemon.php");

class Trainer
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $badgesNumber = 0;
    /**
     * @var Pokemon[]
     */
    public $pokemons = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}