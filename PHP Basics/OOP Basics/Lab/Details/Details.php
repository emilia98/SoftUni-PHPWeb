<?php

declare(strict_types = 1);
class Details
{
    /**
     * @var string
     */
    private $engine = null;
    /**
     * @var int
     */
    private $seats = null;
    /**
     * @var int
     */
    private $horsepower = null;

    public function __construct(?string &$engine, ?int &$seats, ?int &$horsepower)
    {
        $this->engine = $engine;
        $this->seats = $seats;
        $this->horsepower = $horsepower;
    }
}