<?php


class CarCollection
{
    private array $cars;

    public function addCar(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function getCars(): array
    {
        return $this->cars;
    }
    public function getCarCount(): int
    {
        return count($this->cars);
    }
}