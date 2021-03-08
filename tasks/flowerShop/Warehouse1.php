<?php


class Warehouse1 implements Warehouses
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
}