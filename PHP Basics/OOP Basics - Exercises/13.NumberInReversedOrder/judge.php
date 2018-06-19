<?php

class DecimalNumber
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        $toString = strval($this->number);
        $reversed = '';

        for($i = 0; $i < strlen($toString); $i++) {
            $reversed = $toString[$i].$reversed;
        }
        return $reversed;
    }
}

$number = trim(fgets(STDIN));


$reversed = new DecimalNumber($number);
echo $reversed;