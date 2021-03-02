<?php

require_once 'Survey.php';
$energyDrink = new Survey(12467, 0.14, 0.64);


echo "Total number of people surveyed " . $energyDrink->getSurveyed() . PHP_EOL;
echo "Approximately " . $energyDrink->calculateEnergyDrinkers() . " bought at least one energy drink" . PHP_EOL;
echo $energyDrink->calculatePreferCitrus() . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;