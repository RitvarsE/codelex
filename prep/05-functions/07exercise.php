<?php
/*
 * Imagine you own a gun store.
 * Only certain guns can be purchased with license types.
 * Create an object (person) that will be the requester to purchase a gun (object) Person object has a name, valid licenses (multiple) & cash.
 * Guns are objects stored within an array. Each gun has license letter, price & name.
 * Using PHP in-built functions determine if the requester (person) can buy a gun from the store.
 */
/*
 * 1.2.1	Manual -> a
1.2.2	Lever action -> b
1.2.3	Pump action -> c
1.2.4	Semi-automatic -> d
1.2.5	Automatic -> e
1.2.6	Selective fire -> f
 */
$persons = (object)['name' => 'Ritvars', 'license' => ['a', 'b', 'c'], 'cash' => 500];
$guns = [
    (object)['weapon' => 'Glock', 'license' => 'f', 'price' => 150],
    (object)['weapon' => 'ak-47', 'license' => 'a', 'price' => 150],
    (object)['weapon' => 'm4a1', 'license' => 'c', 'price' => 600],
    (object)['weapon' => 'scout', 'license' => 'd', 'price' => 50],
    (object)['weapon' => 'rocket launcher', 'license' => 'e', 'price' => 400]
];
$weaponName = readLine("Enter a product name:");
foreach ($guns as $gun) {
    if ($weaponName === $gun->weapon && in_array($gun->license, $persons->license) && $persons->cash >= $gun->price) {
        echo "$persons->name, you can buy $gun->weapon for $$gun->price";
    }
}
