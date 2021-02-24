<?php
function FizzBuzz(int $number): string
{
    $line = '';
    for ($x = 1; $x <= $number; $x++) {
        if ($x % 20 === 0) {
            if ($x % 15 === 0) {
                $line .= 'FizzBuzz' . PHP_EOL;
            } elseif ($x % 5 === 0) {
                $line .= 'Buzz ' . PHP_EOL;
            }
        } elseif ($x % 15 === 0) {
            $line .= 'FizzBuzz ';
        } elseif ($x % 3 === 0) {
            $line .= 'Fizz ';
        } elseif ($x % 5 === 0) {
            $line .= 'Buzz ';
        } else {
            $line .= $x . ' ';
        }
    }
    return $line;
}

$inputNumber = readline('Max value? ');
echo FizzBuzz($inputNumber);