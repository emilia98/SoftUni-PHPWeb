<?php

class Company
{
    private $companyName;
    private $department;
    private $salary;

    public function __construct( string $companyName,
                                 string $department,
                                 float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString()
    {
        $formatedSalary = number_format($this->salary, 2);
        return $this->companyName." ".$this->department." ".$formatedSalary.PHP_EOL;
    }
}

class Pokemon
{
    private $pokemonName;
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

class CustomParent {
    private $name;
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

class Child
{
    private $name;
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

class Car
{
    private $model;
    private $speed;

    public function __construct(string $model, int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    public function __toString()
    {
        return $this->model." ".$this->speed.PHP_EOL;
    }
}

class Person {
    private $name;
    private $company;
    private $car;
    private $parents;
    private $children;
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

$input = trim(fgets(STDIN));
$people = [];

while ($input != "End") {
    $tokens = explode(' ', $input);

    $name = $tokens[0];
    $dataType = $tokens[1];

    if(!array_key_exists($name,$people)) {
        $person = new Person($name);
        $people[$name] = $person;
    }

    if($dataType == 'company'){
        $companyName = $tokens[2];
        $department = $tokens[3];
        $salary = floatval($tokens[4]);

        $company = new Company($companyName, $department, $salary);
        $people[$name]->setCompany($company);
    } else if($dataType == 'pokemon') {
        $pokemonName = $tokens[2];
        $pokemonType = $tokens[3];

        $pokemon = new Pokemon($pokemonName, $pokemonType);
        $people[$name]->addPokemon($pokemon);
    } else if($dataType == 'parents') {
        $parentName = $tokens[2];
        $parentBirthday = $tokens[3];

        $parent = new CustomParent($parentName, $parentBirthday);
        $people[$name]->addParent($parent);
    } else if($dataType == 'children') {
        $childName = $tokens[2];
        $childBirthday = $tokens[3];

        $child = new Child($childName, $childBirthday);
        $people[$name]->addChild($child);
    } else if($dataType == 'car') {
        $model = $tokens[2];
        $speed = intval($tokens[3]);

        $car = new Car($model, $speed);
        $people[$name]->setCar($car);
    }
    $input = trim(fgets(STDIN));
}

$personToFind = trim(fgets(STDIN));
$person = $people[$personToFind];

echo $person->__toString();