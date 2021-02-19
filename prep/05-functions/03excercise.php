<?php
$person = new stdClass();
$person->name = 'Ritvars';
$person->surname = 'Eglajs';
$person->age = 29;
function checkAge($age): bool
{
    return $age->age >= 18;
}

if (checkAge($person)) {
    echo "$person->name has reached 18.";
}