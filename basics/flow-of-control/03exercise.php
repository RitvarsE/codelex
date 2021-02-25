<?php
$inputNumber = readline("Input your positive number: ");

if ($inputNumber >= 0 && is_numeric($inputNumber)) {

    if (fmod($inputNumber, 1) == 0) {
        echo strlen($inputNumber);
    } else {
        $splitNumber = explode('.', $inputNumber);
        echo strlen(implode('', $splitNumber));
    }

} else {
    echo 'You must input positive number!';
}