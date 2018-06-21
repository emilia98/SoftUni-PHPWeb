<?php

class DateModifier {
    public static function GetDifference(DateTime $d1, DateTime $d2)
    {
        return $d1->diff($d2);
    }
}