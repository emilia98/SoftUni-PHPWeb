<?php

class Car
{
    private $model;
    private $speed;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed(int $speed)
    {
        $this->speed = $speed;
    }
}

class Child
{
    private $name;

    private $birthday;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }
}

class Company
{
    private $name;
    private $department;
    private $salary;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment(string $department)
    {
        $this->department = $department;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }
}

class CustomParent
{
    private $name;
    private $birthday;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }
}

class Pokemon {
    private $name;
    private $type;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }
}

class Person
{
    private $name;
    private $company = null;
    private $parents = [];
    private $children = [];
    private $pokemons = [];
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

$input = trim(fgets(STDIN));
$people = [];

while ($input != "End") {

    $tokens = explode(" ", $input);

    $personName = $tokens[0];
    $inputType = $tokens[1];

    if(array_key_exists($personName, $people) == false) {
        $person = new Person();
        $person->setName($personName);
        $people[$personName] = $person;
    }

    if($inputType == "company") {
        $company = new Company();
        $company->setName($tokens[2]);
        $company->setDepartment($tokens[3]);
        $company->setSalary(floatval($tokens[4]));

        $people[$personName]->registerCompany($company);
    } else if($inputType == "pokemon") {
        $pokemon = new Pokemon();
        $pokemon->setName($tokens[2]);
        $pokemon->setType($tokens[3]);

        $people[$personName]->registerPokemon($pokemon);
    } else if($inputType == "parents") {
        $parent = new CustomParent();
        $parent->setName($tokens[2]);
        $parent->setBirthday($tokens[3]);

        $people[$personName]->registerParent($parent);
    } else if($inputType == "children") {
        $child = new Child();
        $child->setName($tokens[2]);
        $child->setBirthday($tokens[3]);

        $people[$personName]->registerChild($child);
    } else if($inputType == "car") {
        $car = new Car();
        $car->setModel($tokens[2]);
        $car->setSpeed(intval($tokens[3]));

        $people[$personName]->registerCar($car);
    }
    $input = trim(fgets(STDIN));
}

$personToFind = trim(fgets(STDIN));
$person = $people[$personToFind];

echo $person->__toString();