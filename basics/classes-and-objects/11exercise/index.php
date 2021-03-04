<?php

require_once 'Account.php';

$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartos_account->getName() . ' ' . number_format($bartos_account->getBalance(), 2) . PHP_EOL;
echo $bartos_swiss_account->getName() . ' ' . number_format($bartos_swiss_account->getBalance(), 2) . PHP_EOL;

echo PHP_EOL;
$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . number_format($bartos_account->getBalance(), 2) . PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: " . number_format($bartos_swiss_account->getBalance(), 2) . PHP_EOL;

echo PHP_EOL;
echo "Final state" . PHP_EOL;
echo $bartos_account->getName() . ' ' . number_format($bartos_account->getBalance(), 2) . PHP_EOL;
echo $bartos_swiss_account->getName() . ' ' . number_format($bartos_swiss_account->getBalance(), 2) . PHP_EOL;

$mattAccount = new Account("Matt`s account", 1000);
$myAccount = new Account('My account', 0);

$mattAccount->withdrawal(100.0);
$myAccount->deposit(100.0);

echo PHP_EOL;
echo $mattAccount->getName() . ' ' . number_format($mattAccount->getBalance(), 2) . PHP_EOL;
echo $myAccount->getName() . ' ' . number_format($myAccount->getBalance(), 2) . PHP_EOL;

$A = new Account('A account', 100.0);
$B = new Account('B account', 0.0);
$C = new Account('C account', 0.0);

$A->transfer($B, 50);
$B->transfer($C, 25);

echo PHP_EOL;
echo $A->getName() . ' ' . number_format($A->getBalance(), 2) . PHP_EOL;
echo $B->getName() . ' ' . number_format($B->getBalance(), 2) . PHP_EOL;
echo $C->getName() . ' ' . number_format($C->getBalance(), 2) . PHP_EOL;