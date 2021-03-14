<?php


class DriverCollection
{
    private array $drivers;

    public function addDriver(Driver $driver): void
    {
        $this->drivers[] = $driver;
    }

    public function getDrivers(): array
    {
        return $this->drivers;
    }
}