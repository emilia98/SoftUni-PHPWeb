<?php

class Engine
{
    /**
     * @var int
     */
    private $speed;

    /**
     * @var int
     */
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