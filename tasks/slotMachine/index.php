<?php
require_once 'SlotMachine.php';
$moneyToPlay = readline('Starting sum: ');
$symbols = new SlotMachine('Symbols');
$symbols->startGame($moneyToPlay);




//Sapratu, ka jātaisa atsevišķi viss, lai šeit ir echo nevis klasēs, bet nepietika laiks, lai ko tādu izdarītu.