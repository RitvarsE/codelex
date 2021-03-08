<?php

class flowerShop
{
    public function __construct()
    {
    }

    public function listAllFlowers(Warehouses $warehouse): array
    {
        return $warehouse->flowers();
    }

}