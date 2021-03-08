<?php

class flowerCollection
{
    private array $flowers;

    public function addFlower(Flower $flower): void
    {
        $this->flowers[] = $flower;
    }
}