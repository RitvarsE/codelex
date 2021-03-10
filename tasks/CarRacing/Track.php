<?php


class Track
{
    private int $length;
    private array $track = [];

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function drawTrack(): string
    {
        return str_repeat('.', $this->length);
    }

    public function start(CarCollection $f1Race): void
    {
        for ($x = 0; $x < $f1Race->getCarCount(); $x++) {
            $car = $f1Race->getCars()[$x];
            $this->track[] = substr_replace($this->drawTrack(), $car->getName(), 0, 1);
        }
    }

    public function move(CarCollection $f1Race): void
    {
        for ($x = 0; $x < $f1Race->getCarCount(); $x++) {
            $car = $f1Race->getCars()[$x];
            $this->track[$x] = substr_replace($this->drawTrack(), $car->getName(), (strpos($this->track[$x], $car->getName()) + $car->drive()), 1);
        }
    }

    public function track(): array
    {
        return $this->track;
    }
}