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

    public function addWarehouse(Warehouses $warehouse): void
    {
        $this->warehouseList[] = $warehouse;
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

    public function getWareHouse(string $flower): Warehouses
    {
        foreach ($this->getWarehouses() as $warehouse) {
            foreach ($warehouse->getFlowerCollection()->getFlowers() as $flowers) {
                if ($flowers->getName() === $flower) {
                    return $warehouse;
                }
            }
        }
    }

}