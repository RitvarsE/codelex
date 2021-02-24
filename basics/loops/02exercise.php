<?php

echo "Input number of terms: ";

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function
$i = 5;
$number = $i;
$power = readline("How much times multiply $i : ");
// netaisīšu nekādu validāti uz inputu, domāju, ka tas šeit nav svarīgākais
do {
    $number *= $i;
    $power--;
} while ($power > 1);
echo $number;