<?php
/*
 * Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
 * Create a for loop that iterates non-associative array using php in-built function that determines count of elements in the array.
 *  Create a function that doubles the integer number.
 * Within the loop using php in-built function print out the double of the number value (using your custom function).
 */
$number_array = [
    5,
    15,
    22,
    2.5,
    'beststring'
];
for ($x = 0; $x < count($number_array); $x++) {
    if (is_int($number_array[$x])) {
        echo double_integer($number_array[$x]) . PHP_EOL;
    }
}
function double_integer($number): float
{
    return $number * 2;
}