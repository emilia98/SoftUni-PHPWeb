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

$input = trim(fgets(STDIN));
$number = new DecimalNumber();
$number->setNumber($input);
echo $number->getReversed();