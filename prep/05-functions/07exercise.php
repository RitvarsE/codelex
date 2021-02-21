<?php
/*
 * Imagine you own a gun store.
 * Only certain guns can be purchased with license types.
 * Create an object (person) that will be the requester to purchase a gun (object) Person object has a name, valid licenses (multiple) & cash.
 * Guns are objects stored within an array. Each gun has license letter, price & name.
 * Using PHP in-built functions determine if the requester (person) can buy a gun from the store.
 */

$persons = (object)['name' => 'Ritvars', 'license' => ['a', 'b', 'c'], 'cash' => 500];
$guns = [
    (object)['weapon' => 'glock', 'license' => 'f', 'price' => 150],
    (object)['weapon' => 'ak-47', 'license' => 'a', 'price' => 150],
    (object)['weapon' => 'm4a1', 'license' => 'c', 'price' => 600],
    (object)['weapon' => 'scout', 'license' => 'a', 'price' => 50],
    (object)['weapon' => 'rocket launcher', 'license' => 'e', 'price' => 400]
];
echo "We have these weapons in our store: " . PHP_EOL; // līdz $weaponName tīri tikai informācijai izprintē
foreach ($guns as $gun) {
    echo $gun->weapon . PHP_EOL;
}
foreach ($guns as $gun) {
    if (in_array($gun->license, $persons->license) && $persons->cash >= $gun->price) {
        echo "$persons->name, you can buy $gun->weapon for $$gun->price" . PHP_EOL;
    }
}
$weaponName = readline("What weapon do you want to buy?: "); // var atstāt arī tikai šo daļu.
foreach ($guns as $gun) {
    if ($weaponName === $gun->weapon && in_array($gun->license, $persons->license) && $persons->cash >= $gun->price) {
        echo "$persons->name, you bought $gun->weapon for $$gun->price. You have left $" . ($persons->cash - $gun->price) . ' in your wallet.';
    }
}