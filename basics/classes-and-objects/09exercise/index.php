<?php

require_once 'BankAccount.php';

$ben = new BankAccount('Benson', 17.25);
echo $ben->showUserNameAndBalance();

$ritvars = new BankAccount('Ritvars', -15.5);
echo PHP_EOL . $ritvars->showUserNameAndBalance();