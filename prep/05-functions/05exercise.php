<?php
$products = [
    'box1' => ['fruit' => 'apples', 'weight' => 11],
    'box2' => ['fruit' => 'pears', 'weight' => 5],
    'box3' => ['fruit' => 'kiwi', 'weight' => 3],
    'box4' => ['fruit' => 'bananas', 'weight' => 40],
    'box5' => ['fruit' => 'pears', 'weight' => 15]
];
$shippingCost = [
    'over10' => 2,
    'under10' => 1];
function ship_cost($product, $shippingCost): string
{
    if ($product['weight'] > 10) {
        return "Your {$product['fruit']} shipping cost is {$shippingCost['over10']} euros." . PHP_EOL;
    } else {
        return "Your {$product['fruit']} shipping cost is {$shippingCost['under10']} euro." . PHP_EOL;
    }
}

foreach ($products as $product) {
    echo ship_cost($product, $shippingCost);
}