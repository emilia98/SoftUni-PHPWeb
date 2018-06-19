<?php

namespace OldestFamilyMember;
class Family
{
    /**
     * @var Person[]
     */
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