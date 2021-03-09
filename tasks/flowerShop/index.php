<?php
/*
 * FlowerShop
 * List of flowers & prices
 * Option to purchase
 * First question: male/female
 * if female -> apply 20% discount at end
 * 3 different warehouses where flowers come from.
 * FlowerShop -> Warehouse1/Warehouse2/Warehouse3
 */
require_once 'Warehouses.php';
require_once 'Warehouse1.php';
require_once 'Warehouse2.php';
require_once 'Warehouse3.php';
require_once 'flowerShop.php';
require_once 'flower.php';
require_once 'flowerCollection.php';

$flowerShop = new flowerShop('Only Best Flowers');

$flowerShop->addWarehouse($wareHouse1 = new Warehouse1('WareHouse1'));
$flowerShop->addWarehouse($wareHouse2 = new Warehouse2('WareHouse2'));
$flowerShop->addWarehouse($wareHouse3 = new Warehouse3('WareHouse3'));


$flowersInShop = new flowerCollection([
    new flower('tulip', 100),
    new flower('rose', 200),
    new flower('orchid', 150),
    new flower('lily', 50),
    new flower('peony', 100),
    new flower('cactus', 100),
]);

$wareHouse1->addFlower(new flower('tulip', 0, 50));
$wareHouse1->addFlower(new flower('rose', 0, 50));
$wareHouse2->addFlower(new flower('orchid', 0, 80));
$wareHouse2->addFlower(new flower('lily', 0, 30));
$wareHouse3->addFlower(new flower('peony', 0, 10));
$wareHouse3->addFlower(new flower('daisy', 0, 40));

//Printē pieejamās puķes.
foreach ($flowersInShop->getFlowers() as $flowers) {
    if (in_array($flowers->getName(), $flowerShop->AllFlowers(), true)) {
        echo ucfirst($flowers->getName()) . ' ' . $flowers->getPrice() . PHP_EOL;
    }
}

$inputGender = strtolower(readline('Are you a male or female? '));

$inputFlower = strtolower(readline('Choose flower: '));

if (in_array($inputFlower, $flowerShop->getAvailableFlowers($flowersInShop), true)) {
    do {
        $inputAmount = readline('How many do you want?: ');
    } while ($inputAmount <= 0 || !is_numeric($inputAmount));
} else {
    echo 'Sorry, we don`t have this flower';
    exit;
}

$numberForPrinting = 0;

foreach ($flowerShop->getWarehouses() as $warehouse) {
    foreach ($warehouse->getFlowerCollection()->getFlowers() as $flower) {
        if ($inputFlower === $flower->getName()) {
            if ($flower->getQuantity() >= $inputAmount) {
                $flowerShop->deliveryWarehouse($flowerShop->getWareHouse($inputFlower, $inputAmount), $inputFlower, $inputAmount);
                $numberForPrinting = 1;
            } else {
                echo 'Sorry, we don`t have that many ' . $flower->getName() . 's. We have only: ' . $flower->getQuantity();
            }
        }

    }
}
if ($numberForPrinting === 1) {
    foreach ($flowersInShop->getFlowers() as $flower) {
        if ($flower->getName() === $inputFlower) {
            if ($inputGender === 'female') {
                echo 'You bought ' . $inputAmount . ' ' . $inputFlower . 's for ' . ($flower->getPrice() * $inputAmount) * 0.8;
            } else {
                echo 'You bought ' . $inputAmount . ' ' . $inputFlower . 's for ' . $flower->getPrice() * $inputAmount;
            }
        }
    }
}
