<?php


/*
 * uzzīmēt trasi.
 * automobīļi var būt dažādi - nosaukums un ātrums.
 * ātrums(min,max)
 * kad pabeidz trasi, tad izprintējās saraksts un cik ilgā laikā pabeidza.
 * line uzzīmēt pašā objektā. Line likt iekšā objektu.
 * //move kustiba-> parbaudīt vai mašīna var kustēties vai ir gala punktā vai nē.
 */
require_once 'DriverInterface.php';
require_once 'Car.php';
require_once 'CarCollection.php';
require_once 'Track.php';

$f1Race = new CarCollection();
$f1Race->addCar(new Car('$', 1, 4));
$f1Race->addCar(new Car('#', 1, 5));
$f1Race->addCar(new Car('@', 1, 5));
$f1Race->addCar(new Car('S', 1, 4));
$f1Race->addCar(new Car('D', 1, 5));
$f1Race->addCar(new Car('>', 1, 5));



$track = new Track(50, $f1Race);

$track->start();

echo 'Let`s start the race!' . PHP_EOL;
foreach ($track->track() as $line) {
    echo $line . PHP_EOL;
}
sleep(1);
$counter = 0;
while (count($track->getPlaces()) !== $track->getCars()->getCarCount()) {
    $track->move();
    echo PHP_EOL;
    $counter++;
    echo 'Time: ' . $counter . PHP_EOL;
    foreach ($track->track() as $line) {
        echo $line . PHP_EOL;
    }
    sleep(1);
    echo PHP_EOL;
}

for ($x = 1; $x <= $track->getCars()->getCarCount(); $x++) {
    echo $x . '. car: ' . $track->getPlaces()[$x - 1] . PHP_EOL;
}
