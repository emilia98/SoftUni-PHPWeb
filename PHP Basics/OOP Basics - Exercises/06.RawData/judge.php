<?php

class Engine
{
    public $speed;
    public $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }
}

class Cargo
{
    public $weight;
    public $type;

    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }
}

class Tire
{
    public $age;
    public $pressure;

    public function __construct(int $age, float $pressure)
    {
        $this->age = $age;
        $this->pressure = $pressure;
    }
}

class Car
{
    public $model;
    public $engine;
    public $cargo;
    public $tires = [];

    public function __construct(string $model, Engine $engine,
                                Cargo $cargo)
    {
        $this->model = $model;
        $this->engine = $engine;
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

   $engine = new Engine($engineSpeed, $enginePower);
   $cargo = new Cargo($cargoWeight, $cargoType);
   $car = new Car($model, $engine, $cargo);

   $tiresData = array_slice($tokens, 5);

   for($index = 0; $index < count($tiresData); $index += 2) {
       $tirePressure = floatval($tiresData[$index]);
       $tireAge = intval($tiresData[$index + 1]);

       $tire = new Tire($tireAge, $tirePressure);
       $car->addTire($tire);
   }
   $cars[] = $car;
}

$command = trim(fgets(STDIN));

$filterFunc = null;

if($command == "fragile") {
    $filterFunc = function($car, $type) {
        $getCargoType = $car->cargo->type;
        $getTires = $car->tires;
        $lowPressure = false;

        foreach($getTires as $tire) {
            if($tire->pressure < 1) {
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
        $getCargoType = $car->cargo->type;
        $enginePower = $car->engine->power;
        return $getCargoType == $type && $enginePower > 250;
    };

    $filteredCars =
        getCarsByCargoType($filterFunc, "flamable", $cars);
}

foreach ($filteredCars as $car) {
    echo $car->model.PHP_EOL;
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
?>