<?php

class flowerCollection
{
    private array $flowers;

    public function __construct(array $flowers)
    {
        foreach ($flowers as $flower) {
            $this->addFlower($flower);
        }
    }

    public function addFlower(Flower $flower): void
    {
        $this->flowers[] = $flower;
    }

    public function getFlowers(): array
    {
        return $this->flowers;
    }

    public function AllFlowers(): array
    {
        $allFlowers = [];
        foreach ($this->flowers as $flower) {
            $allFlowers[] = $flower->getName();
        }
        return $allFlowers;
    }
}