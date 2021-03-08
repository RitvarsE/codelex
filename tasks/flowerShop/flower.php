<?php

class Flower
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
}