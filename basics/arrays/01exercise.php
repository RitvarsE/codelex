<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: " . print_r($numbers) . PHP_EOL;

//todo
$sortedNumbers = $numbers;
sort($sortedNumbers); // lai nesortētu oriģinālo masīvu
echo "Sorted numeric array: " . print_r($sortedNumbers) . PHP_EOL;

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: " . print_r($words) . PHP_EOL;

//todo
$sortedWords = $words;
sort($sortedWords); // lai nesortētu oriģinālo masīvu
echo "Sorted string array: " . print_r($sortedWords). PHP_EOL;