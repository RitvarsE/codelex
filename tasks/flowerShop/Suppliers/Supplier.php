<?php

interface Supplier
{
    public function getProducts(): ProductCollection;

    public function buy(object $productName, int $howMuch): void;
}