<?php

class DecimalNumber
{
    private $number;

    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    public function getReversed()
    {
        return strrev($this->number);
    }
}