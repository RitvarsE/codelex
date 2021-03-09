<?php

class flowerShop
{
    private string $name;
    private array $warehouseList = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getWarehouses(): array
    {
        return $this->warehouseList;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function AllFlowers(): array
    {
        $getAllFlowersFromStock = [];
        foreach ($this->getWarehouses() as $warehouse) {
            foreach ($warehouse->getFlowerCollection()->getFlowers() as $flowers) {
                if ($flowers->getQuantity() > 0) {
                    $getAllFlowersFromStock[] = $flowers->getName();
                }
            }
        }
        return $getAllFlowersFromStock;
    }

    public function getAvailableFlowers(flowerCollection $flowerCollection): array
    {
        $availableFlowers = [];
        foreach ($flowerCollection->getFlowers() as $flowers) {
            if (in_array($flowers->getName(), $this->AllFlowers(), true)) {
                $availableFlowers[] = $flowers->getName();
            }
        }
        return $availableFlowers;
    }

    // saņemu, kurā warehouse ir puķe.
    public function getWareHouse(string $flower, int $amount): ?Warehouses
    {
        foreach ($this->getWarehouses() as $warehouse) {
            foreach ($warehouse->getFlowerCollection()->getFlowers() as $flowers) {
                if ($flowers->getName() === $flower && $flowers->getQuantity() >= $amount) {
                    return $warehouse;
                }
            }
        }
        return null;
    }

    public function deliveryWarehouse(Warehouses $warehouse, string $flower, int $amount): void
    {
        $warehouse->deliver($flower, $amount);
    }

    public function addWarehouse(Warehouses $warehouse): void
    {
        $this->warehouseList[] = $warehouse;
    }


}