<?php

class Car
{
    private $model;
    private $fuelAmount;
    private $fuelCostPerKm;
    private $distance = 0;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getFuelAmount()
    {
        return $this->fuelAmount;
    }

    public function setFuelAmount(float $amount)
    {
        $this->fuelAmount = $amount;
    }

    public function getFuelCost()
    {
        return $this->fuelCostPerKm;
    }

    public function setFuelCost(float $cost)
    {
        $this->fuelCostPerKm = $cost;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function setDistance(float $distance)
    {
        $this->distance = $distance;
    }

    public static function Move(Car $car, float $fuelToUse)
    {
        if (round($car->getFuelAmount(), 5) - round($fuelToUse, 5) >= 0) {
            return true;
        }
        return false;
    }
}

$n = trim(fgets(STDIN));
$linesCount = 1;
$cars = [];

while ($linesCount <= $n)
{
    $input = trim(fgets(STDIN));
    $tokens = explode(' ', $input);

    $carModel = $tokens[0];
    $fuelAmount = floatval($tokens[1]);
    $fuelCost = floatval($tokens[2]);

    $car = new Car();
    $car->setModel($carModel);
    $car->setFuelAmount($fuelAmount);
    $car->setFuelCost($fuelCost);

    $cars[$carModel] = $car;
    $linesCount++;
}

$input = trim(fgets(STDIN));

while ($input != 'End')
{
    $tokens = explode(' ', $input);

    $modelToFind = $tokens[1];
    $kmToMove = floatval($tokens[2]);
    $car = null;

    if(array_key_exists($modelToFind, $cars)) {
        $car = $cars[$modelToFind];
    }

    if($car != null)
    {
        $fuelToUse = $kmToMove * $car->getFuelCost();
        if(Car::Move($car, $fuelToUse)) {

            $car->setDistance($car->getDistance() + $kmToMove);
            $car->setFuelAmount($car->getFuelAmount() - $fuelToUse);
        }
        else {
            echo 'Insufficient fuel for the drive'.PHP_EOL;
        }
    }
    $input = trim(fgets(STDIN));
}

foreach($cars as $car) {
    $model = $car->getModel();
    $fuelAmount = number_format(round($car->getFuelAmount(), 2, PHP_ROUND_HALF_UP), 2);
    $distanceTraveled = $car->getDistance();

    echo $model." ".$fuelAmount." ".$distanceTraveled.PHP_EOL;
}