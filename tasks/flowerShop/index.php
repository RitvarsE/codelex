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

$wareHouse1->addFlower(new flower('tulip', 0, 100));
$wareHouse1->addFlower(new flower('rose', 0, 50));
$wareHouse2->addFlower(new flower('orchid', 0, 50));
$wareHouse2->addFlower(new flower('lily', 0, 30));
$wareHouse3->addFlower(new flower('peony', 0, 10));
$wareHouse3->addFlower(new flower('daisy', 0, 40));

foreach ($flowersInShop->getFlowers() as $flowers) {
    if (in_array($flowers->getName(), $flowerShop->AllFlowers(), true)) {
        echo $flowers->getName() . ' ' . $flowers->getPrice() . PHP_EOL;
    }
}

var_dump($flowerShop->getWareHouse('rose')->getName());
