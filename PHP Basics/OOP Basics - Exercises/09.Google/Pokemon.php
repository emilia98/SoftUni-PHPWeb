<?php

class Pokemon
{
    /**
     * @var string
     */
    private $pokemonName;
    /**
     * @var string
     */
    private $pokemonType;

    public function __construct(string $name, string $type)
    {
        $this->pokemonName = $name;
        $this->pokemonType = $type;
    }

    public function __toString()
    {
        return $this->pokemonName." ".$this->pokemonType.PHP_EOL;
    }
}