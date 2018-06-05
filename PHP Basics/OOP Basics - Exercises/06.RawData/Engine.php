<?php

class Engine
{
    /**
     * @var int
     */
    public $speed;

    /**
     * @var int
     */
    public $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }
}