<?php

class DateModifier {
    public static function GetDifference(DateTime $d1, DateTime $d2)
    {
        return $d1->diff($d2);
    }
}

$dates = [];
$linesCount = 1;

while ($linesCount <= 2) {
    $input = trim(fgets(STDIN));
    $date = DateTime::createFromFormat('Y m d', $input);
    $dates[] = $date;
    $linesCount++;
}

echo DateModifier::GetDifference($dates[0], $dates[1])->days;