<?php


class Warehouse2 implements Warehouses
{
    private array $flowers;
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function deliver(): void
    {
        var_dump(15);
    }

    public function addFlower(flower $flower): void
    {
        $this->flowers[] = $flower;
    }

    public function getFlowerCollection(): flowerCollection
    {
        return new flowerCollection($this->flowers);
    }

}