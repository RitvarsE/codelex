<?php

class FuelGauge
{
    private int $fuelAmount;
    public int $fuelByKm = 0;
    private int $gaugeSize;

    public function __construct(int $fuelAmount, int $gaugeSize)
    {
        $this->gaugeSize = $gaugeSize;
        $this->fuelAmount = $fuelAmount;
    }

    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    public function getGaugeSize(): int
    {
        return $this->gaugeSize;
    }

    public function incrementFuel(int $putFuel): void
    {
        $this->fuelAmount++;
        if ($this->fuelAmount >= $this->gaugeSize) {
            $this->fuelAmount = $this->gaugeSize;
        }

    }

    public function decrementFuel(): void
    {
        $this->fuelAmount--;
    }
}

$volvoFuel = new FuelGauge(20, 70);

class Odometer
{
    public string $name;
    private int $mileage;

    public function __construct(string $name, int $mileage)
    {
        $this->name = $name;
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage(): void
    {
        $this->mileage++;
        if ($this->mileage >= 999999) {
            $this->mileage = 0;
        }
    }

    public function driving(FuelGauge $tank): void
    {
        $this->incrementMileage();
        $tank->fuelByKm++;
        if ($tank->fuelByKm === 10) {
            $tank->decrementFuel();
            $tank->fuelByKm = 0;
        }

    }
}

$volvoOdometer = new Odometer('Volvo', 999980);

//Bākas pildīšana.
echo 'You have ' . $volvoFuel->getFuelAmount() . ' l in your fuel gauge. Let`s start filling it.' . PHP_EOL;
while ($volvoFuel->getFuelAmount() < $volvoFuel->getGaugeSize()) {
    $volvoFuel->incrementFuel(90);
}
echo 'Fuel Gauge:' . $volvoFuel->getFuelAmount() . PHP_EOL;
// Braukšana:
while ($volvoFuel->getFuelAmount() > 0) {
    $volvoOdometer->driving($volvoFuel);
    if ($volvoFuel->fuelByKm === 0) {
        echo 'Odometer: ' . $volvoOdometer->getMileage() . ' Fuel: ' . $volvoFuel->getFuelAmount() . ' l' . PHP_EOL;
    }
}

//Bākas pildīšana.
echo 'You have ' . $volvoFuel->getFuelAmount() . ' l in your fuel gauge. Let`s start filling it.' . PHP_EOL;
while ($volvoFuel->getFuelAmount() < $volvoFuel->getGaugeSize()) {
    $volvoFuel->incrementFuel(90);
}
echo 'Fuel Gauge:' . $volvoFuel->getFuelAmount();