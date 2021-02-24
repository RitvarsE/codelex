<?php
function checkInput(int $number): bool
{
    if ($number < 13 && $number > 1) {
        return true;
    }
    return false;
}

$sum = readline('What sum do you want?(2-12) ');
if (checkInput((int)$sum)) {
    do {
        $dice1 = rand(1, 6);
        $dice2 = rand(1, 6);
        echo "$dice1 and $dice2 = " . ($dice1 + $dice2) . PHP_EOL;
    } while (($dice1 + $dice2) !== (int)$sum);
} else {
    echo 'You must input valid input between 2 and 12';
}