<?php


/*
 * uzzīmēt trasi.
 * automobīļi var būt dažādi - nosaukums un ātrums.
 * ātrums(min,max)
 * kad pabeidz trasi, tad izprintējās saraksts un cik ilgā laikā pabeidza.
 * line uzzīmēt pašā objektā. Line likt iekšā objektu.
 */
require_once 'CarInterface.php';
require_once 'Car.php';
require_once 'CarCollection.php';
require_once 'Track.php';

$f1Race = new CarCollection();
$f1Race->addCar(new Car('$', [1, 4]));
$f1Race->addCar(new Car('#', [1, 5]));
$f1Race->addCar(new Car('@', [1, 1]));

foreach ($f1Race->getCars() as $car) {
    echo $car->getName() . ' speed: ' . $car->drive() . PHP_EOL;
}
$Track = new Track(15);

$Track->start($f1Race);
var_dump($Track->track());
$Track->move($f1Race);
var_dump($Track->track());
$Track->move($f1Race);
var_dump($Track->track());
$Track->move($f1Race);
var_dump($Track->track());
$Track->move($f1Race);
var_dump($Track->track());
$Track->move($f1Race);
var_dump($Track->track());
