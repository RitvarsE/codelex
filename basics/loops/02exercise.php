<?php

echo "Input number of terms: ";

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function
$inputNumber = readline();
if (is_numeric($inputNumber)) {
    $number = $inputNumber;
    $power = readline("How much times multiply $number : ");
    if (fmod((float)$power, 1) == 0 && is_numeric($power)) {
        if ((int)$power === 1) {
            echo $inputNumber;
        } else {
            do {
                $number *= $inputNumber;
                $power--;
            } while ($power > 1);
            echo $number;
        }
    } else {
        echo 'You must input valid integral!';
    }
} else {
    echo 'You must input valid number!';
    exit;
}