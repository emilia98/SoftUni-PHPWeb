<?php

namespace Google;

class Company
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $department;
    /**
     * @var float
     */
    private $salary;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment(string $department)
    {
        $this->department = $department;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function Props()
    {
        return get_object_vars($this);
    }
}