<?php


class Warehouse2 implements Warehouses
{
    private array $flowers;

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