<?php


require_once 'DriverInterface.php';
require_once 'Car.php';
require_once 'Biker.php';
require_once 'Driver.php';
require_once 'DriverCollection.php';
require_once 'Track.php';
require_once 'Race.php';
require_once 'DrawRace.php';

$f1Race = new DriverCollection();
$f1Race->addDriver(new Driver(new Car(('A'), 1, 6)));
$f1Race->addDriver(new Driver(new Car('B', 1, 6)));
$f1Race->addDriver(new Driver(new Car('C', 1, 6)));
$f1Race->addDriver(new Driver(new Car('D', 1, 6)));
$f1Race->addDriver(new Driver(new Car('E', 1, 6)));
$f1Race->addDriver(new Driver(new Car('F', 1, 6)));
$f1Race->addDriver(new Driver(new Biker('G', 1, 6)));


$latviaGP = new Race($track = new Track(50), $f1Race);
$trackLatviaGp = new DrawRace($track);
print $trackLatviaGp->drawTrack($f1Race);
print PHP_EOL;
while ($latviaGP->stillRacing()) {
    foreach ($f1Race->getDrivers() as $driver) {
        if ($driver->getCrashed() === false && $driver->getPosition() < $track->getLength()) {
            $driver->move();
        }
    }
    print ($trackLatviaGp->drawTrack($f1Race));
    print PHP_EOL;
    usleep(500000);
}
print $trackLatviaGp->drawLeaderBoard($f1Race);
