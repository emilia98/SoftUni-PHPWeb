<?php

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge() :int
    {
        return $this->age;
    }

    public function getName() :string
    {
        return $this->name;
    }
}

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


$people = [];
$n = intval(trim(fgets(STDIN)));

for($index = 1; $index <= $n; $index++) {
    $line = trim(fgets(STDIN));
    $tokens = explode(" ", $line);

    $name = $tokens[0];
    $age = intval($tokens[1]);

    $person = new Person($name, $age);
    $people[] = $person;
}

$people = array_filter($people, "filterFunc");
usort($people, "sortByName");

foreach($people as $person){
    echo $person->getName()." - ".$person->getAge().PHP_EOL;
}