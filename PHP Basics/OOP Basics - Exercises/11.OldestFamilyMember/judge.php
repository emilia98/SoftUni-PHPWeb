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

    static public function compare(Person $a, Person $b)
    {
        if ($a->age >= $b->age) return -1;
        if ($a->age < $b->age) return 1;
    }

    public function __toString()
    {
        return $this->name." ".$this->age.PHP_EOL;
    }
}

class Family
{
    private $members;

    public function __construct()
    {
        $this->members = [];
    }

    public function addMember(Person $member)
    {
        $this->members[] = $member;
    }

    public function getOldestMember()
    {
        usort($this->members, "sortByAge");
        return $this->members[0];
    }
}

function sortByAge($a, $b) {
    return Person::compare($a, $b);

}

$n = trim(fgets(STDIN));
$lineIndex = 1;
$family = new Family();

while ($lineIndex <= $n) {
    $line = trim(fgets(STDIN));

    $tokens = explode(" ", $line);
    $name = $tokens[0];
    $age = intval($tokens[1]);

    $person = new Person($name, $age);
    $family->addMember($person);
    $lineIndex++;
}

$oldest = $family->getOldestMember();
echo $oldest->__toString();