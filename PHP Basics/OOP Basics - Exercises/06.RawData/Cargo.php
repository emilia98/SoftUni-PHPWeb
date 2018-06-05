<?php

class Cargo
{
    /**
     * @var int
     */
    public $weight;

    /**
     * @var string
     */
    public $type;

    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }

    /*
    public function getWeight()
    {
        return $this->weight;
    }

    public function getType()
    {
        return $this->type;
    }*/
}