<?php

namespace Google;
use ReflectionClass;

class Person
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Company
     */
    private $company = null;
    /**
     * @var CustomParent[]
     */
    private $parents = [];
    /**
     * @var Child[]
     */
    private $children = [];
    /**
     * @var Pokemon[]
     */
    private $pokemons = [];
    /**
     * @var Car
     */
    private $car = null;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function registerCompany(Company $company)
    {
        $this->company = $company;
    }

    public function registerParent(CustomParent $parent)
    {
        $this->parents[] = $parent;
    }

    public function registerChild(Child $child)
    {
        $this->children[] = $child;
    }

    public function registerPokemon(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }

    public function registerCar(Car $car)
    {
        $this->car = $car;
    }

    public function __toString()
    {
        $result = [];
        $result[] = $this->name;

        $result[] = "Company:";
        if($this->company != null) {
           $result[] = $this->IterateProps($this->company);
        }

        $result[] = "Car:";
        if($this->car != null) {
            $result[] = $this->IterateProps($this->car);
        }

        $result[] = "Pokemon:";
        foreach ($this->pokemons as $pokemon) {
            $result[] = $this->IterateProps($pokemon);
        }

        $result[] = "Parents:";
        foreach ($this->parents as $parent) {
            $result[] = $this->IterateProps($parent);
        }

        $result[] = "Children:";
        foreach ($this->children as $child) {
            $result[] = $this->IterateProps($child);
        }

        return implode("\n", $result);
    }

    public function IterateProps($obj)
    {
        $result = [];
        $reflection = new ReflectionClass($obj);
        $propsInfo = $reflection->getProperties();

        foreach ($propsInfo as $propInfo) {
            $propName = $propInfo->getName();

            $prop = $reflection->getProperty($propName);
            $prop->setAccessible(true);
            $propValue = $prop->getValue($obj);

            if($propName == "salary") {
                $propValue = number_format($propValue, 2);
            }
            $result[] = $propValue;
        }
        return implode(" ", $result);
    }
}