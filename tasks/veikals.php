<?php
$products = [
    'Apple' => 2,
    'Banana' => 5,
    'Meat' => 20,
    'Water' => 5,
    'Wine' => 15
];
echo 'We have these products in our shop:' . PHP_EOL ;
foreach($products as $key=>$product){
    echo $key . PHP_EOL;
}

$productName = ucfirst(strtolower(readLine('Enter a product name:')));

function cart(array $products, string $productName): string
{
    if (array_key_exists($productName, $products)) {
        $quantity = readLine('Enter a quantity: ');
        $calculatedPrice = $products[$productName] * $quantity;
        return "In your cart are $quantity $productName. Total price $$calculatedPrice.";
    } else {
        return 'Sorry, we don`t have that product in our shop';
    }
}

echo cart($products, $productName);