<?php

require_once 'Dog.php';
require_once 'Dogs.php';

//adding dogs

$dogSchool = new Dogs([
    $max = new Dog('Max', 'male'),
    $rocky = new Dog('Rocky', 'male'),
    $sparky = new Dog('Sparky', 'male'),
    $buster = new Dog('Buster', 'male'),
    $sam = new Dog('Sam', 'male'),
    $lady = new Dog('Lady', 'female'),
    $molly = new Dog('Molly', 'female'),
    $coco = new Dog('Coco', 'female'),
]);

//adding mothers
$max->setMother($lady);
$coco->setMother($molly);
$rocky->SetMother($molly);
$buster->setMother($lady);

//adding fathers
$max->setFather($rocky);
$coco->setFather($buster);
$rocky->setFather($sam);
$buster->setFather($sparky);

//print out all dog information
foreach ($dogSchool->getDogs() as $dog) {
    echo 'Dog: ' . $dog->getName();
    echo ' | Sex: ' . $dog->getSex();
    echo ' | Mother: ' . $dog->getMother();
    echo ' | Father: ' . $dog->getFather() . PHP_EOL;
}

// check if dogs have same mother.
echo $max->HasSameMotherAs($buster) ? 'true' : 'false';
