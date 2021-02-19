<?php

$numberStart = readline("Input your start integer: ");
$numberEnd = readline("Input your end integer: ");
function produceSum(int $numberStart, int $numberEnd): string
{
    if ($numberStart > $numberEnd) {
        echo 'Your start number must be lower than end number.';
        exit;
    }
    $returnArray = [];
    $sum = 0;
    for ($x = $numberStart; $x <= $numberEnd; $x++) {
        $sum += $x;
    }
    array_push($returnArray, $sum, $sum / $numberEnd);
    return 'Your sum is ' . $returnArray[0] . ' and average is ' . $returnArray[1] . '!';
}

echo produceSum($numberStart, $numberEnd);