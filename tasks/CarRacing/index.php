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
$f1Race->addCar(new Car('$', [3, 4]));
$f1Race->addCar(new Car('#', [1, 5]));
$f1Race->addCar(new Car('@', [1, 1]));

foreach ($f1Race->getCars() as $car) {
    echo $car->getName() . ' speed: ' . $car->drive() . PHP_EOL;
}
$Track = new Track(15);

$track = [];

//trases sākums
for ($x = 0; $x < $f1Race->getCarCount(); $x++) {
    $track[] = substr_replace($Track->drawTrack(), $f1Race->getCars()[$x]->getName(), 0, 1);
}
var_dump($track);
