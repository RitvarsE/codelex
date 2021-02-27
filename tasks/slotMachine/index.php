<?php
require_once 'SlotMachine.php';
$moneyToPlay = readline('Starting sum: ');
$symbols = new SlotMachine('Symbols');
$symbols->startGame($moneyToPlay);
//$symbols->game();
//echo 'You have left: ' . $symbols->getBalance() . PHP_EOL;

