<?php

function CheckOddEven(int $number): string
{
    if ($number % 2 !== 0) {
        return $number . ' is Odd Number. bye!';
    }
    return $number . ' is Even Number. bye!';
}

$number = readline("Insert number: ");
echo CheckOddEven($number);