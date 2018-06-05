<?php

class Tire
{
    /**
     * @var int
     */
    public $age;

    /**
     * @var float
     */
    public $pressure;

    public function __construct(int $age, float $pressure)
    {
        $this->age = $age;
        $this->pressure = $pressure;
    }
}