<?php

namespace Google;

class Car
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var int
     */
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