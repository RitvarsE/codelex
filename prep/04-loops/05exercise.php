<?php
$persons = [
    [
        "name" => 'Ritvars',
        "surname" => 'Eglajs',
        "age" => '29',
        "birthday" => '09.09.1991'
    ],
    [
        "name" => 'Janis',
        "surname" => 'Berzins',
        "age" => '50',
        "birthday" => '24.06.71'
    ]
];
foreach ($persons as $person) {

    echo $person["name"] . PHP_EOL . $person["surname"] . PHP_EOL . $person["age"] . PHP_EOL . $person["birthday"] . PHP_EOL;
}