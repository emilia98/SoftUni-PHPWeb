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
    private $fuelCostPerKm;
    /**
     * @var float
     */
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