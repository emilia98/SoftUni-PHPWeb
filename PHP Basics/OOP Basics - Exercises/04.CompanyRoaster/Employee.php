<?php

class Employee
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $salary;
    /**
     * @var string
     */
    private $position;
    /**
     * @var string
     */
    private $department;
    /**
     * @var string
     */
    private $email;
    /**
     * @var int
     */
    private $age;

    public function __construct(
        string $name, float $salary, string $position,
        string $department, string $email, int $age)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    public static function SortEmployees(Employee $first, Employee $second)
    {
        if(round($first->salary, 10) >= round($second->salary, 10)) {
            return -1;
        }
        return 1;
    }

    public static function PrintEmployees($employees) {
        $result = [];
        foreach ($employees as $employee) {
            $result[] = $employee->name." ".number_format($employee->salary, 2)." ".$employee->email." ".$employee->age;
        }

        return implode(PHP_EOL, $result);
    }
}