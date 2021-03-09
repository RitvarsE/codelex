<?php

interface Warehouses
{
    public function deliver(string $flowerName, int $amount): void;
}