<?php

class flower
{
    private string $name;
    private int $price;
    private int $quantity;

    public function __construct(string $name, int $price = 0, int $quantity = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $amount): void
    {
        $this->quantity -= $amount;
    }

}