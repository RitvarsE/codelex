<?php


class Car implements DriverInterface
{
    private string $name;
    private int $minSpeed;
    private int $maxSpeed;
    private const MAX_SPEED = 10;
    private const MIN_SPEED = 1;

    public function __construct(string $name, int $minSpeed, int $maxSpeed)
    {
        $this->name = $name;
        $this->minSpeed = $minSpeed < 0 ? self::MIN_SPEED : min($minSpeed, self::MAX_SPEED);
        $this->maxSpeed = $maxSpeed < $this->minSpeed ? $minSpeed : min(self::MAX_SPEED, $maxSpeed);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSpeed(): int
    {
        return random_int($this->minSpeed, $this->maxSpeed);

    }


}