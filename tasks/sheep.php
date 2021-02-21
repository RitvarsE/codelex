<?php

$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'wolf', 'sheep', 'sheep',];
//expected output: Happy, Happy, OMG, HEHE, OMG, HEHE, OMG, Happy

for ($x = 0; $x < count($animals); $x++) {
    if ($animals[$x] === 'wolf') {
        echo "HEHE ";
        continue;
    }
    if ((isset($animals[$x - 1]) && $animals[$x - 1] === 'wolf') || isset($animals[$x + 1]) && $animals[$x + 1] === 'wolf') {
        echo 'OMG ';
        continue;
    }
    echo 'Happy ';
}
//isset pārbauda vai tāda vērtība eksistē vai nē.