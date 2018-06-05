<?php

require_once ('Engine.php');
require_once ('Cargo.php');
require_once ('Tire.php');

class Car
{
    /**
     * @var string
     */
    public $model;

    /**
     * @var Engine
     */
    public $engine;

    /**
     * @var Cargo
     */
    public $cargo;

    /**
     * @var Tire[]
     */
    public $tires = [];

    public function __construct(string $model, Engine $engine,
                                Cargo $cargo)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
    }

    public function addTire(Tire $tire)
    {
        $this->tires[] = $tire;
    }
}