<?php

require_once ('Person.php');

$peopleInfo = [
    "Pesho" => 12,
    "Stamat" => 31,
    "Ivan" => 48
];
$people = [];

foreach ($peopleInfo as $name=>$age) {
    $person = new Person($name, $age);
    $people[] = $person;
    var_dump($person);
}






