<?php

echo "Input the 1st number: ";
$inputFirst = readline();
echo "Input the 2nd number: ";
$inputSecond = readline();
echo "Input the 3rd number: ";
$inputThird = readline();
//todo print the largest number
if (!is_numeric($inputThird) || !is_numeric($inputSecond) || !is_numeric($inputFirst)) {
    echo 'You must input only numbers!';
} else {
    echo 'Largest number is: ' . max($inputFirst, $inputSecond, $inputThird);
}