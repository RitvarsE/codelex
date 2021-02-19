<?php

$number = readline("Input your number: ");
function factorial(int $number): int
{
    $multiple = 1;
    for ($x = 1; $x <= $number; $x++) {
        $multiple *= $x;
    }
    return $multiple;
}

echo factorial($number);