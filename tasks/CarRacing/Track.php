<?php


class Track
{
    private int $length;
    private array $track = [];
    private CarCollection $drivers;
    private array $places = [];
    private const SYMBOL = '=';

    public function __construct(int $length, CarCollection $drivers)
    {
        $this->length = $length;
        $this->drivers = $drivers;
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
        return strpos($this->track[$driver], $this->drivers->getDrivers()[$driver]->getName());
    }

    public function setFinished(int $driver): void
    {
        $this->track[$driver] = substr_replace($this->drawTrack(), $this->drivers->getDrivers()[$driver]->getName(), -1, 1);
    }

    public function cantMove(int $driver): bool
    {
        return $this->getDriverPosition($driver) >= $this->getLength() - 1;
    }

    public function start(): void
    {
        for ($x = 0; $x < $this->drivers->getDriverCount(); $x++) {
            $this->track[] = substr_replace($this->drawTrack(), $this->drivers->getDrivers()[$x]->getName(), 0, 1);
        }
    }

    public function move(int $driver): void
    {
        $this->track[$driver] =
            substr_replace($this->drawTrack(), $this->drivers->getDrivers()[$driver]->getName(),
                $this->getDriverPosition($driver) + $this->drivers->getDrivers()[$driver]->drive(), 1);
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
        return $this->drivers;
    }

    public function setPlaces(string $driver): void
    {
        $this->places[] = $driver;
    }

}