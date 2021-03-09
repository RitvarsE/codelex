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

    public function deliver(string $flowerName, int $amount): void
    {
        foreach ($this->getFlowerCollection()->getFlowers() as $flower) {
            if ($flower->getName() === $flowerName) {
                $flower->setQuantity($amount);
            }
        }
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