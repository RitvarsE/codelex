<?php


class Warehouse1 implements Warehouses, Discount
{
    public array $flowers;

    public function __construct(array $flowers)
    {
        $this->flowers = $flowers;
    }

    public function flowers(): array
    {
        return $this->flowers;
    }
    public function whatSex(): bool
    {
        // TODO: Implement whatSex() method.
    }
}