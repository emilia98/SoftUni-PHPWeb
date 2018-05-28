<?php

require_once('Car.php');

$pairs = [
    "VW"=>'GOLF',
    "Hyuindai"=>"I20",
    'Opel'=>" Corsa",
    'BMW'=>"X5",
    '' => ""
];

$cars = [];

foreach($pairs as $brand=>$model) {

    try {
        $car = new Car($brand, $model);
        var_dump($car);
        $cars[] = $car;
    }
    catch (Exception $e) {
        var_dump($e->getMessage());
    }
}

$years = [2012, "2009", -5, '2015e', 2017];

for($index = 0; $index < min(count($years), count($cars)); $index++) {
    $car = $cars[$index];
    try {
        $car->setYear($years[$index]);
        var_dump($car);
    }
    catch (Exception $e) {
        var_dump($e->getMessage());
    }
}