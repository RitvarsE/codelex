<?php


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

$wareHouse1->addFlower(new flower('tulip', 0, 50));
$wareHouse1->addFlower(new flower('rose', 0, 50));
$wareHouse2->addFlower(new flower('orchid', 0, 80));
$wareHouse2->addFlower(new flower('lily', 0, 30));
$wareHouse3->addFlower(new flower('peony', 0, 10));
$wareHouse3->addFlower(new flower('daisy', 0, 40));


$flowersInShop = new flowerCollection([
    new flower('tulip', 100),
    new flower('rose', 200),
    new flower('orchid', 150),
    new flower('lily', 50),
    new flower('peony', 100),
    new flower('cactus', 100),
]);

//Printē pieejamās puķes.
echo 'Welcome to ' . $flowerShop->getName() . PHP_EOL;
foreach ($flowersInShop->getFlowers() as $flowers) {
    if (in_array($flowers->getName(), $flowerShop->AllFlowers(), true)) {
        echo ucfirst($flowers->getName()) . ' $' . number_format($flowers->getPrice() / 100, 2) . PHP_EOL;
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
                $flowerShop->deliveryWarehouse($flowerShop->getWareHouse($inputFlower), $inputFlower, $inputAmount);
                $numberForPrinting = 1;
            } else {
                echo 'Sorry, we don`t have that many ' . $flower->getName();
                echo 's. We have only: ' . $flower->getQuantity();
            }
        }

    }
}
if ($numberForPrinting === 1) {
    foreach ($flowersInShop->getFlowers() as $flower) {
        if ($flower->getName() === $inputFlower) {
            if ($inputGender === 'female') {
                echo 'You bought ' . $inputAmount . ' ' . $inputFlower . 's for $';
                echo number_format(($flower->getPrice() * $inputAmount) * 0.8 / 100, 2);
                echo ' From ' . $flowerShop->getWareHouse($inputFlower)->getName();
            } else {
                echo 'You bought ' . $inputAmount . ' ' . $inputFlower . 's for $';
                echo number_format($flower->getPrice() * $inputAmount / 100, 2);
                echo ' From ' . $flowerShop->getWareHouse($inputFlower)->getName();
            }
        }
    }
}
