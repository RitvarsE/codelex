<?php
require_once 'SlotMachine.php';
$moneyToPlay = readline('Starting sum: ');
$symbols = new SlotMachine('Symbols');
$symbols->startGame($moneyToPlay);
echo 'Your sum: ' . $symbols->getBalance() . PHP_EOL;
$bet = readline('Choose your bet(Increment 10): ');
$symbols->bet($bet);
//$symbols->game();
//echo 'You have left: ' . $symbols->getBalance() . PHP_EOL;

