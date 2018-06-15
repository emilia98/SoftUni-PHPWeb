<?php

namespace Google;

class Child
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $birthday;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }
}