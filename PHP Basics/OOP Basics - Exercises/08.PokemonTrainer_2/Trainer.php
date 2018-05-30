<?php

require_once ('Pokemon.php');

class Trainer
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $badgesCount = 0;

    /**
     * @var Pokemon[]
     */
    private $pokemons = [];


    public function getName() :string
    {
        return $this->name;
    }

    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    public function getBadgesCount() :int
    {
        return $this->badgesCount;
    }

    public function setBadgesCount(int $badges) :void
    {
        $this->badgesCount = $badges;
    }

    public function getPokemons()
    {
        return $this->pokemons;
    }

    public function setPokemons($pokemons)
    {
        $this->pokemons = $pokemons;
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }
}