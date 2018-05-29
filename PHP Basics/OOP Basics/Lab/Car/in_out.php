<?php

require_once ('Car.php');
$cars = [];

for($counter = 1; $counter < 5; $counter++) {
    $line = trim(fgets(STDIN));
    $tokens = explode(" ", $line);

    $brand = $tokens[0];
    $model = $tokens[1];
    $years = $tokens[2];

    $car = new Car($brand, $model);
    $car->setYear($years);
    $cars[] = $car;
}

function sortCars($a, $b) {
    if($a->getBrand() == $b->getBrand()) {

        if($a->getModel() == $b->getModel()) {

            if($a->getYear() == $b->getYear()) {
                return 0;
            }

            $a->getYear() > $b->getYear() ? $result = 1 : $result = -1;
            return $result;
        }

        $a->getModel() > $b->getModel() ? $result = 1 : $result = -1;
        return $result;
    }

    $a->getBrand() > $b->getBrand() ? $result = 1 : $result = -1;
    return $result;
}

usort($cars, 'sortCars');

for ($index = 0; $index < count($cars); $index++) {
    $car = $cars[$index];
    $carProps = [];
    $carProps[] = $cars[$index]->getBrand();
    $carProps[] = $cars[$index]->getModel();
    $carProps[] = $cars[$index]->getYear();
    echo implode(',', $carProps).PHP_EOL;
}

/*
Sample Input:
Renault Scenic 2010
Audi A6 12
Audi A6 10
Renault SCENIC 2010
*/
