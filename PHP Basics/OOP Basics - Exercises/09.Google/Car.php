<?php

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

    public function __construct(string $model, int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    public function __toString()
    {
        return $this->model." ".$this->speed.PHP_EOL;
    }
}