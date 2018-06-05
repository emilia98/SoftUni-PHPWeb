<?php

class Engine
{
    private $speed;
    private $power;

    public function getSpeed() :int
    {
        return $this->speed;
    }

    public function getPower() :int
    {
        return $this->power;
    }

    public function setSpeed(int $speed)
    {
        $this->speed = $speed;
    }

    public function setPower(int $power)
    {
        $this->power = $power;
    }
}

class Cargo
{
    private $weight;
    private $type;

    public function getWeight() :int
    {
        return $this->weight;
    }

    public function getType() :string
    {
        return $this->type;
    }

    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }
}

class Tire
{
    private $age;
    private $pressure;

    public function getAge() :int
    {
        return $this->age;
    }

    public function getPressure() :float
    {
        return $this->pressure;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setPressure(float $pressure)
    {
        $this->pressure = $pressure;
    }
}

class Car
{
    private $model;
    private $engine;
    private $cargo;
    private $tires = [];

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getCargo() :Cargo
    {
        return $this->cargo;
    }

    public function getTires()
    {
        return $this->tires;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function setCargo(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }

    public function addTire(Tire $tire)
    {
        $this->tires[] = $tire;
    }
}


$n = intval(trim(fgets(STDIN)));
$cars = [];

for($lineNum = 1; $lineNum <= $n; $lineNum++) {
    $line = trim(fgets(STDIN));
    $tokens = explode(" ", $line);

    $model = $tokens[0];
    $engineSpeed = intval($tokens[1]);
    $enginePower = intval($tokens[2]);
    $cargoWeight = intval($tokens[3]);
    $cargoType = $tokens[4];

    $engine = new Engine();
    $engine->setSpeed($engineSpeed);
    $engine->setPower($enginePower);

    $cargo = new Cargo();
    $cargo->setType($cargoType);
    $cargo->setWeight($cargoWeight);

    $car = new Car();
    $car->setModel($model);
    $car->setEngine($engine);
    $car->setCargo($cargo);

    $tiresData = array_slice($tokens, 5);

    for($index = 0; $index < count($tiresData); $index += 2) {
        $tirePressure = floatval($tiresData[$index]);
        $tireAge = intval($tiresData[$index + 1]);

        $tire = new Tire();
        $tire->setAge($tireAge);
        $tire->setPressure($tirePressure);
        $car->addTire($tire);
    }
    $cars[] = $car;
}

$command = trim(fgets(STDIN));

$filterFunc = null;

if($command == "fragile") {
    $filterFunc = function($car, $type) {
        $getCargoType = $car->getCargo()->getType();
        $getTires = $car->getTires();
        $lowPressure = false;

        foreach($getTires as $tire) {
            if($tire->getPressure() < 1) {
                $lowPressure = true;
                break;
            }
        }
        return $getCargoType == $type && $lowPressure;
    };

    $filteredCars =
        getCarsByCargoType($filterFunc, "fragile", $cars);
}
else if($command == "flamable") {
    $filterFunc = function($car, $type) {
        $getCargoType = $car->getCargo()->getType();
        $enginePower = $car->getEngine()->getPower();
        return $getCargoType == $type && $enginePower > 250;
    };

    $filteredCars =
        getCarsByCargoType($filterFunc, "flamable", $cars);
}

foreach ($filteredCars as $car) {
    echo $car->getModel().PHP_EOL;
}

function getCarsByCargoType($filterFunc, $type, $cars)
{
    $result = [];
    foreach ($cars as $car) {
        if($filterFunc($car, $type)) {
            $result[] = $car;
        }
    }
    return $result;
}
