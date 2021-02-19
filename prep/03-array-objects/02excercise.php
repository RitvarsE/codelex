<?php

$person = [
    "name" => "John", // name aizstāj 0(id)
    "surname" => "Doe", // surname aizstāj 1(id)
    "age" => 50,
    10 // šīs būs 0(id), jo iet masīvā viss uz priekšu, ja iepriekšējiem piešķirtas savas atslēgas.
];
var_dump($person["name"], $person["surname"], $person["age"]);
echo $person[0]; // printēs ārā 10.