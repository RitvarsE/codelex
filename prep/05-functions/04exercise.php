<?php
$persons = [
    (object)["name" => 'Ritvars', "surname" => 'Eglajs', "age" => 29],
    (object)["name" => 'Janis', "surname" => 'Berzins', "age" => 50],
    (object)["name" => 'Karlis', "surname" => 'Zarins', "age" => 11]
];
function checkAge($age): bool
{
    return $age >= 18;
}

foreach ($persons as $person) {
    if (checkAge($person->age)) {
        echo "$person->name has reached 18." . PHP_EOL;
    } else {
        echo "$person->name is underage." . PHP_EOL;
    }
}