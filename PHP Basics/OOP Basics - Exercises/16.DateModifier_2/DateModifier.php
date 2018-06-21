<?php

class DateModifier {
    const SECONDS_PER_DAY = 60 *60 * 24;

    private $first_date;
    private $second_date;

    public function __construct(DateTime $d1, DateTime $d2)
    {
        $this->first_date = $d1;
        $this->second_date = $d2;
    }

    public function getDifference()
    {
        $first_timestamp = $this->first_date->getTimestamp();
        $second_timestamp = $this->second_date->getTimestamp();
        $diff = abs($first_timestamp - $second_timestamp);
        return $diff / self::SECONDS_PER_DAY;
    }
}