<?php

require_once ('Person.php');

$peopleData = [
    'pesho' => 3,
    'Annie' => 5,
    'Gosho' => 4

];

$people = [];
foreach ($peopleData as $name => $age) {
    $person = new Person($name, $age);
    $people[] = $person;
}

var_dump($people);

usort($people, "sortByAge");

var_dump($people[0]);
var_dump($people);
function sortByAge($a, $b) {
    if ($a->age >= $b->age) return -1;
    if ($a->age < $b->age) return 1;
}