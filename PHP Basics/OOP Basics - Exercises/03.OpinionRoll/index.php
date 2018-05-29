<?php

require_once ('Person.php');

function filterFunc($p){
    return $p->getAge() > 30;
}

function sortByName($a, $b) {
    $nameA = $a->getName();
    $nameB = $b->getName();

    if($nameA == $nameB) {
        return 0;
    }
    return $nameA > $nameB ? 1 : -1;
}

function printResult($dict) {
    $peopleInfo = $dict;
    $people = [];

    foreach ($peopleInfo as $name=>$age) {
        $person = new Person($name, $age);
        $people[] = $person;
    }

    var_dump($peopleInfo);

    $people = array_filter($people, "filterFunc");
    usort($people, "sortByName");
    var_dump($people);
    echo "<p>------------</p>";
}


printResult(
    [
        "Pesho" => 12,
        "Stamat" => 31,
        "Ivan" => 48
    ]
);

printResult(
    [
        "Nikolai" => 33,
        "Yordan" => 88,
        "Tosho" => 22,
        "Lyubo" => 44,
        "Stanislav" => 11
    ]
);



