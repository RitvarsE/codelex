<?php
$products = [
    'Apple' => 2,
    'Banana' => 5,
    'Meat' => 20,
    'Coca-Cola' => 5,
    'Wine' => 15
];
$productName = readLine('Enter a product name:');
$quantity = readLine('Enter a quantity: ');
function cart(array $products, string $productName, int $quantity): string
{
    $calculatedPrice = $products[$productName] * $quantity;
        return "In your cart are $quantity $productName with total price $$calculatedPrice.";
}

echo cart($products, $productName, $quantity);
// jāuztaisa pārbaude vai produkts ir iekš objekta vai nav.