<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
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

$n = trim(fgets(STDIN));
$linesCount = 1;
$departmentsInfo = [];
$departmentsEmployees = [];

while ($linesCount <= $n)
{
    $line = trim(fgets(STDIN));
    $tokens = explode(' ', $line);

    $name = $tokens[0];
    $salary = floatval($tokens[1]);
    $position = $tokens[2];
    $department = $tokens[3];
    $age = -1;
    $email = "n/a";

    if (count($tokens) === 5) {
        if (is_int($tokens[4]) === 1) {
            $age = intval($tokens[4]);
        } else {
            $email = $tokens[4];
        }
    } else if (count($tokens) === 6) {
        $email = $tokens[4];
        $age = intval($tokens[5]);
    }

    $employee = new Employee($name,$salary, $position,
                             $department, $email, $age);

    if(array_key_exists($department, $departmentsInfo) == false) {
        $departmentsInfo[$department] = [
            'salary' => 0,
            'avg' => 0,
            'employees' => 0
        ];
        $departmentsEmployees[$department] = [];
    }

    $data = $departmentsInfo[$department];
    $data['employees'] += 1;
    $data['salary'] += $salary;
    $data['avg'] = $data['salary'] / $data['employees'];

    $departmentsInfo[$department] = $data;
    $departmentsEmployees[$department][] = $employee;
    $linesCount++;
}

uasort($departmentsInfo, "sortBySalary");

$highestPaidDepartment = null;

foreach ($departmentsInfo as $department => $salary) {
    $highestPaidDepartment = $department;
    break;
}
$employees = $departmentsEmployees[$highestPaidDepartment];

usort($employees, "employeeBySalary");

echo "Highest Average Salary: ".$highestPaidDepartment.PHP_EOL;
echo Employee::PrintEmployees($employees);


function sortBySalary ($a, $b) {
    if (round($a['avg'], 10) >= round($b['avg'], 10)) return -1;
    return 1;
}

function employeeBySalary ($a, $b) {
    return Employee::SortEmployees($a, $b);
}