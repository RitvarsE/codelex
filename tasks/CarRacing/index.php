<?php


/*
 * uzzīmēt trasi.
 * automobīļi var būt dažādi - nosaukums un ātrums.
 * ātrums(min,max)
 * kad pabeidz trasi, tad izprintējās saraksts un cik ilgā laikā pabeidza.
 * line uzzīmēt pašā objektā. Line likt iekšā objektu.
 * //move kustiba-> parbaudīt vai mašīna var kustēties vai ir gala punktā vai nē.
 * //Trasei nav jābūt reiseriem.
 * Jāpārtaisa carCollection uz DriverCollection -> lai var pieivenot arī ko citu.
 */
require_once 'DriverInterface.php';
require_once 'Car.php';
require_once 'CarCollection.php';
require_once 'Track.php';

$f1Race = new CarCollection();
$f1Race->addDriver(new Car('$', 1, 4));
$f1Race->addDriver(new Car('#', 1, 5));
$f1Race->addDriver(new Car('@', 1, 5));
$f1Race->addDriver(new Car('S', 1, 4));
$f1Race->addDriver(new Car('D', 1, 5));
$f1Race->addDriver(new Car('>', 1, 5));


$track = new Track(40, $f1Race);

$track->start();

//Print start
echo 'Let`s start the race!' . PHP_EOL;
foreach ($track->track() as $line) {
    echo $line . PHP_EOL;
}
sleep(1);

$counter = 0;
$time = [];

//Move
while (count($track->getPlaces()) !== $track->getCars()->getDriverCount()) {
    $counter++;
    echo 'Time: ' . $counter . PHP_EOL;
    for ($x = 0; $x < $f1Race->getDriverCount(); $x++) {
        $driver = $f1Race->getDriver()[$x];
        if ($track->getDriverPosition($x) + $driver->drive() >= $track->getLength() - 1) {
            $track->setFinished($x);
            if (!in_array($driver->getName(), $track->getPlaces(), true)) {
                $track->setPlaces($driver->getName());
                $time[] = $counter;
            }
        } else {
            $track->move($x);
            if ($track->cantMove($x)) {
                $track->setFinished($x);
                if (!in_array($driver->getName(), $track->getPlaces(), true)) {
                    $track->setPlaces($driver->getName());
                    $time[] = $counter;
                }
            }
        }
    }
    foreach ($track->track() as $line) {
        echo $line . PHP_EOL;
    }
    sleep(1);
}
//Print places
for ($x = 1; $x <= $track->getCars()->getDriverCount(); $x++) {
    echo $x . '. car: ' . $track->getPlaces()[$x - 1] . ' | Time: ' . $time[$x - 1] . PHP_EOL;
}
