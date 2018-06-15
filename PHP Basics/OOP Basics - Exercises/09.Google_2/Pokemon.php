<?php

namespace Google;

class Pokemon {
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $type;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function Props()
    {
        return get_object_vars($this);
    }
}