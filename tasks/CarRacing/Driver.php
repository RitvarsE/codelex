<?php


class Driver
{
    private DriverInterface $driver;
    private int $position = 0;
    private int $time = 0;
    private bool $crashed = false;
    private const CRASH_RATE = 1;

    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function getDriver(): DriverInterface
    {
        return $this->driver;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function move(): void
    {
        $this->setCrashed(random_int(1, 100));
        if ($this->getCrashed()) {
            return;
        }
        $this->position += $this->driver->getSpeed();
        $this->time++;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function getCrashed(): bool
    {
        return $this->crashed;
    }

    public function setCrashed(int $crashRate): void
    {
        if ($crashRate < self::CRASH_RATE) {
            $this->crashed = true;
        }
    }

}