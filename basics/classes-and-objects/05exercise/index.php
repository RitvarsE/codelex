<?php

require_once "Date.php";

$birthday = new Date(9, 9, 1991);

$birthday->setDate(12, 5, 2000);

echo $birthday->getDay() . '/' . $birthday->getMonth() . '/' . $birthday->getYear();