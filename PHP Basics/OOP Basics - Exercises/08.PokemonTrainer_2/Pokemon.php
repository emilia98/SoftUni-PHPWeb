<?php

class Pokemon
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $element;

    /**
     * @var int
     */
    private $health;

    public function getName() :string
    {
        return $this->name;
    }

    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    public function getElement() :string
    {
        return $this->element;
    }

    public function setElement(string $element) :void
    {
        $this->element = $element;
    }

    public function getHealth() :int
    {
        return $this->health;
    }

    public function setHealth(int $health) :void
    {
        $this->health = $health;
    }
}