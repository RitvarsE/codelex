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
require_once 'Discount.php';
require_once 'Warehouse1.php';
require_once 'Warehouse2.php';
require_once 'Warehouse3.php';
require_once 'flowerShop.php';

$warehouse1 = new Warehouse1(['tulip' => 20, 'rose' => 30]);
$warehouse2 = new Warehouse2(['lily' => 5, 'orchid' => 15]);
$warehouse3 = new Warehouse3(['carnation' => 50, 'hyacinth' => 3]);

$flowerShop = new flowerShop();
