<?php

require_once('Car.php');

$car1 = new Car("VW", 'GOLF');
$car1->setYear(2012);

$details = [
    'engine' => 'petrol',
    'seats' => 5,
    'horsepower' => 75
];

$car1->addDetails($details['engine'], $details['seats'], $details['horsepower']);

var_dump($car1);

$car2 = new Car("Hyuindai", "I20");
$car2->setYear("2017");

$details = [
    'engine' => null,
    'seats' => 5,
    'horsepower' => null,
];

$car2->addDetails($details['engine'], $details['seats'], $details['horsepower']);

var_dump($car2);