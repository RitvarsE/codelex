<?php


class Track
{
    private int $length;
    private array $track = [];
    private CarCollection $cars;
    private array $places = [];
    private const SYMBOL = '=';

    public function __construct(int $length, CarCollection $cars)
    {
        $this->length = $length;
        $this->cars = $cars;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function drawTrack(): string
    {
        return str_repeat(self::SYMBOL, $this->length);
    }

    public function getDriverPosition(int $driver): int
    {
        return strpos($this->track[$driver], $this->cars->getCars()[$driver]->getName());
    }

    public function setDriverPosition(int $driver): void
    {
        $this->track[$driver] =
            substr_replace($this->drawTrack(), $this->cars->getCars()[$driver]->getName(),
                $this->getDriverPosition($driver) + $this->cars->getCars()[$driver]->drive(), 1);
    }

    public function finished(int $driver): bool
    {
        return $this->getDriverPosition($driver) >= $this->getLength() - 1;
    }

    public function setFinished(int $driver): void
    {
        $this->track[$driver] = substr_replace($this->drawTrack(), $this->cars->getCars()[$driver]->getName(), -1, 1);
    }

    public function start(): void
    {
        for ($x = 0; $x < $this->cars->getCarCount(); $x++) {
            $this->track[] = substr_replace($this->drawTrack(), $this->cars->getCars()[$x]->getName(), 0, 1);
        }
    }

    public function move(): void
    {
        for ($x = 0; $x < $this->cars->getCarCount(); $x++) {
            $car = $this->cars->getCars()[$x];
            if ($this->getDriverPosition($x) + $car->drive() >= $this->getLength() - 1) {
                $this->setFinished($x);
                if (!in_array($car->getName(), $this->places, true)) {
                    $this->places[] = $car->getName();
                }

            }
            $this->setDriverPosition($x);
            if ($this->finished($x)) {
                $this->setFinished($x);
                if (!in_array($car->getName(), $this->places, true)) {
                    $this->places[] = $car->getName();
                }
            }
        }
    }

    public function track(): array
    {
        return $this->track;
    }

    public function getPlaces(): array
    {
        return $this->places;
    }

    public function getCars(): CarCollection
    {
        return $this->cars;
    }

}