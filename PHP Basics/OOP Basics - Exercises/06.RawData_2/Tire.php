<?php

class Tire
{
    /**
     * @var int
     */
    private $age;

    /**
     * @var float
     */
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