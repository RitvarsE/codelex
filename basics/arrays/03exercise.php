<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";
$numberToCheck = readline();
//todo check if an array contains a value user entered
if (in_array($numberToCheck, $numbers)) {
    echo 'This array contains: ' . $numberToCheck;
} else {
    echo 'Sorry, this array does not contain: ' . $numberToCheck;
}