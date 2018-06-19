<?php

class Car
{
    private $model;
    private $fuelAmount;
    private $fuelPerKilometer;
    private $distance;

    public function __construct(
        string $model, float $amount, float $fuelPerKm)
    {
        $this->model = $model;
        $this->fuelAmount = $amount;
        $this->fuelPerKilometer = $fuelPerKm;
        $this->distance = 0;
    }

    public function move(float $distanceToTravel)
    {
        $fuelNeeded = $distanceToTravel * $this->fuelPerKilometer;
        if(round($fuelNeeded, 10) <= round($this->fuelAmount, 10)) {
            $this->distance += $distanceToTravel;
            $this->fuelAmount -= $fuelNeeded;
            return false;
        }
        return 'Insufficient fuel for the drive';
    }

    public function __toString()
    {
        $fuelAmount = number_format(round($this->fuelAmount,2, PHP_ROUND_HALF_UP), 2);
        return $this->model." ".$fuelAmount." ".$this->distance;
    }
}

$n = intval(trim(fgets(STDIN)));
$lineIndex = 1;
$cars = [];

while($lineIndex <= $n) {
    $line = trim(fgets(STDIN));
    $tokens = explode(' ', $line);

    $model = $tokens[0];
    $fuelAmount = floatval($tokens[1]);
    $pricePerKm = floatval($tokens[2]);

    $car = new Car($model, $fuelAmount, $pricePerKm);
    $cars[$model] = $car;

    $lineIndex++;
}

$command = trim(fgets(STDIN));

while($command != 'End') {
    $cmdTokens = explode(' ', $command);

    if ($cmdTokens[0] == 'Drive') {
        $carModel = $cmdTokens[1];
        $distanceToTravel = floatval($cmdTokens[2]);


        if(array_key_exists($carModel, $cars)) {
            $car = $cars[$carModel];
            $movement = $car->move($distanceToTravel);

            if($movement != false) {
                echo $movement.PHP_EOL;
            }
        }

    }

    $command = trim(fgets(STDIN));
}

foreach ($cars as $model => $car) {
    $car = $cars[$model];
    echo $car.PHP_EOL;
}
