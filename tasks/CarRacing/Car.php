<?php


class Car implements DriverInterface
{
    private string $name;
    private int $minSpeed;
    private int $maxSpeed;

    public function __construct(string $name, int $minSpeed, int $maxSpeed)
    {
        $this->name = $name;
        $this->minSpeed = $minSpeed;
        $this->maxSpeed = $maxSpeed;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMinSpeed(): int
    {
        return $this->minSpeed;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }


    public function drive(): int
    {
        return random_int($this->minSpeed, $this->maxSpeed);

    }

}