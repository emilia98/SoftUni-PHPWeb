<?php

class Company
{
    /**
     * @var string
     */
    private $companyName;
    /**
     * @var string
     */
    private $department;
    /**
     * @var float
     */
    private $salary;

    public function __construct( string $companyName,
                                 string $department,
                                 float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString()
    {
        $formatedSalary = number_format($this->salary, 2);
        return $this->companyName." ".$this->department." ".$formatedSalary.PHP_EOL;
    }
}