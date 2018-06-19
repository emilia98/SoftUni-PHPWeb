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
        $sign = '';
        $start = 0;
        if($toString[0] == '-') {
            $sign = '-';
            $start = 1;
        }

        $reversed = '';

        if($toString[strlen($toString) - 1] == '.') {
            $toString = $toString.'0';
        }

        for($i = $start; $i < strlen($toString); $i++) {
            $reversed = $toString[$i].$reversed;
        }
        return $sign.strval(floatval($reversed));
    }
}

$number = trim(fgets(STDIN));


$reversed = new DecimalNumber($number);
echo $reversed;