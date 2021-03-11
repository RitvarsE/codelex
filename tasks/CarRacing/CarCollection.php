<?php


class CarCollection
{
    private array $drivers;

    public function addDriver(DriverInterface $driver): void
    {
        $this->drivers[] = $driver;
    }

    public function getDrivers(): array
    {
        return $this->drivers;
    }
    public function getDriverCount(): int
    {
        return count($this->drivers);
    }
}