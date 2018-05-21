<?php


class Math
{
    public static function Sum ($a, $b) {
        return $a + $b;
    }

    public static function Divide ($a, $b) {
        if(!(new self)->CheckIfZero($a)
            && !(new self)->CheckIfZero($b)){
            return $a / $b;
        }


    }

    private function CheckIfZero($x) {
        if($x == 0) {
            echo ("Division by zero is not possible");
            return true;
        }
    }
}