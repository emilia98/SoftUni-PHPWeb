<?php

class Car
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var float
     */
    private $fuelAmount;
    /**
     * @var float
     */
    private $fuelPerKilometer;
    /**
     * @var float
     */
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