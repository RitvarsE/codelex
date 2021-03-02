<?php

require_once 'Dog.php';
require_once 'Dogs.php';

//adding dogs

$dogSchool = new Dogs([
    new Dog('Max', 'male'),
    new Dog('Rocky', 'male'),
    new Dog('Sparky', 'male'),
    new Dog('Buster', 'male'),
    new Dog('Sam', 'male'),
    new Dog('Lady', 'female'),
    new Dog('Molly', 'female'),
    new Dog('Coco', 'female'),
]);

//adding mothers
$dogSchool->addMother('Max', 'Lady');
$dogSchool->addMother('Coco', 'Molly');
$dogSchool->addMother('Rocky', 'Molly');
$dogSchool->addMother('Buster', 'Lady');

//adding fathers
$dogSchool->addFather('Max', 'Rocky');
$dogSchool->addFather('Coco', 'Buster');
$dogSchool->addFather('Rocky', 'Sam');
$dogSchool->addFather('Buster', 'Sparky');

//print out all dog information
foreach($dogSchool->getDogs() as $dog){
    echo 'Dog: ' . $dog->getName();
    echo ' | Sex: ' . $dog->getSex();
    echo ' | Mother: ' . $dog->getMother();
    echo ' | Father: ' . $dog->getFather() . PHP_EOL;
}
// check if dogs have same mother.
echo $dogSchool->HasSameMotherAs('Rocky','Coco') ? 'true' : 'false';
