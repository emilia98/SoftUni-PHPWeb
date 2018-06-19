<?php

namespace OldestFamilyMember_2;

class Family
{
    /**
     * @var Person[]
     */
    private $members = [];
    /**
     * @var Person
     */
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