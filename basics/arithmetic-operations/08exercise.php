<?php

$employees = [
    (object)['employee' => 'Employee 1', 'basepay' => 7.50, 'hours' => 35],
    (object)['employee' => 'Employee 1', 'basepay' => 8.20, 'hours' => 47],
    (object)['employee' => 'Employee 1', 'basepay' => 10.00, 'hours' => 73]
];
function totalPay(string $employee, float $basepay, int $hours): string
{
    if ($basepay < 8.00 || $hours > 60) {
        return 'Error' . PHP_EOL;
    } else if ($hours > 40) {
        return $employee . ' salary is $' . ($basepay * 40 + ($hours - 40) * $basepay * 1.5) . PHP_EOL;
    }
    return $employee . ' salary is $' . $basepay * $hours . PHP_EOL;
}

foreach ($employees as $employee) {
    echo totalPay($employee->employee, $employee->basepay, $employee->hours);
}