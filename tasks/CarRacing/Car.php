<?php


class Car implements CarInterface
{
    private string $name;
    private array $speed;

    public function __construct(string $name, array $speed)
    {
        $this->name = $name;
        $this->speed = $speed;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function drive(): int
    {
        try {
            return random_int($this->speed[0], $this->speed[1]);
        } catch (Exception $e) {
        }
    }

}