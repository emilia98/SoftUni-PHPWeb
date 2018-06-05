<?php

require_once ('Person.php');

printGreeting('Pesho');
printGreeting('Jennifer');

function printGreeting(string $name){
    $person = new Person();
    $person->setName($name);
    $person->greet();
}
