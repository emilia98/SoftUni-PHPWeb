<?php

class Cargo
{
    /**
     * @var int
     */
    private $weight;

    /**
     * @var string
     */
    private $type;

    public function getWeight() :int
    {
        return $this->weight;
    }

    public function getType() :string
    {
        return $this->type;
    }

    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }
}