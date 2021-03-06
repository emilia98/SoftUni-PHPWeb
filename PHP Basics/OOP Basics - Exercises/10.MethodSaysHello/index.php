<?php

require_once('Person.php');

printGreeting('Pesho');
printGreeting('Jennifer');

function printGreeting(string $name){
    $person = new Person($name);
    $fields = count(get_object_vars($person));
    $methods = count(get_class_methods($person));

    if ($fields != 1 || $methods != 1) {
        throw new Exception("Too many fields or methods");
    }

}

