<?php

require_once ('Engine.php');

class Car
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var Engine
     */
    private $engine;

    /**
     * @var Cargo
     */
    private $cargo;

    /**
     * @var Tire[]
     */
    private $tires = [];

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getCargo() :Cargo
    {
        return $this->cargo;
    }

    public function getTires()
    {
        return $this->tires;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function setCargo(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }

    public function addTire(Tire $tire)
    {
        $this->tires[] = $tire;
    }
}