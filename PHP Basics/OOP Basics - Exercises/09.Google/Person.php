<?php

require_once ('Company.php');
require_once ('Pokemon.php');
require_once ('CustomParent.php');
require_once ('Child.php');
require_once ('Car.php');

class Person {
    /**
     * @var string
     */
    private $name;
    /**
     * @var Company
     */
    private $company;
    /**
     * @var Car
     */
    private $car;
    /**
     * @var CustomParent[]
     */
    private $parents;
    /**
     * @var Child[]
     */
    private $children;
    /**
     * @var Pokemon[]
     */
    private $pokemons;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->company = null;
        $this->car = null;
        $this->parents = [];
        $this->children = [];
        $this->pokemons = [];
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    public function getPokemons()
    {
        return $this->pokemons;
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }

    public function getParents()
    {
        return $this->parents;
    }

    public function addParent(CustomParent $parent)
    {
        $this->parents[] = $parent;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function addChild(Child $child)
    {
        $this->children[] = $child;
    }

    public function getCar()
    {
        return $this->car;
    }

    public function setCar(Car $car)
    {
        $this->car = $car;
    }

    public function __toString()
    {
        $result = [];
        $result[] = $this->name.PHP_EOL;

        $result[] = "Company:".PHP_EOL;
        if($this->company != null) {
            $result[] = $this->company->__toString();
        }

        $result[] = "Car:".PHP_EOL;
        if($this->car != null) {
            $result[] = $this->car->__toString();
        }

        $result[] = "Pokemon:".PHP_EOL;
        foreach($this->pokemons as $pokemon) {
            $result[] = $pokemon->__toString();
        }

        $result[] = "Parents:".PHP_EOL;
        foreach ($this->parents as $parent) {
            $result[] = $parent->__toString();
        }

        $result[] = "Children:".PHP_EOL;
        foreach ($this->children as $child) {
            $result[] = $child->__toString();
        }

        $result = implode('', $result);
        return $result;
    }
}