<?php

class Person {
    private $name;
    private $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }
}

class Family
{
    private $members = [];
    private $oldest = null;

    public function addMember(Person $member)
    {
        $this->members[] = $member;

        if(count($this->members) === 1) {
            $this->oldest = $member;
            return;
        }

        if($this->oldest->getAge() < $member->getAge()) {
            $this->oldest = $member;
        }
    }

    public function getOldestMember()
    {
        return $this->oldest;
    }
}

$n = intval(trim(fgets(STDIN)));
$family = new Family();

for($i = 1; $i <= $n; $i++) {
    $line = trim(fgets(STDIN));
    $tokens = explode(' ', $line);

    $name = $tokens[0];
    $age = intval($tokens[1]);
    $person = new Person();

    $person->setName($name);
    $person->setAge($age);

    $family->addMember($person);
}

$oldest = $family->getOldestMember();
echo $oldest->getName()." ".$oldest->getAge();

