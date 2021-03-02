<?php

require_once "Date.php";

$birthday = new Date(15, 9, 1991); // 15 nav robežās, ja tālāk netaisīšu setMonth, tad būs errors.

$birthday->setDay(50); // nenostrādās, jo nav robežās
$birthday->setDay(15); // nostrādā

$birthday->setMonth(15); // nenostrādā, jo nav robežās
$birthday->setMonth(5); // nostrādā

$birthday->setYear(-20); // nenostrādā
$birthday->setYear(19999); // nostrādā

echo $birthday->getDay() . '/' . $birthday->getMonth() . '/' . $birthday->getYear();