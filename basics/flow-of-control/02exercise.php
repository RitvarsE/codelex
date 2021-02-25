<?php

echo "Enter the number: ";
$inputNumber = readline();
//todo print if number is positive or negative
if (is_numeric($inputNumber)) {
    if ($inputNumber >= 0) {
        echo $inputNumber . ' is positive';
    } else {
        echo $inputNumber . ' is negative';
    }
} else {
    echo 'You must input number. ';
}