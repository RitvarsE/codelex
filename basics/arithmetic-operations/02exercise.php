<?php

function CheckOddEven(int $number): string
{
    if ($number % 2 !== 0) {
        return $number . ' is Odd Number. ';
    }
    return $number . ' is Even Number. ';
}

$number = readline("Input number: ");
echo CheckOddEven($number) . 'bye!';