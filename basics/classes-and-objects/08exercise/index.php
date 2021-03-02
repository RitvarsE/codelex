<?php

require_once 'SavingsAccount.php';
//validation. Must be number and higher than 0
do {
    $balance = readline('How much money is in the account?: ');
} while ($balance <= 0 || !is_numeric($balance));

//validation. Must be number and higher than 0
do {
    $annualInterestRate = readline('Enter the annual interest rate: ');
} while ($annualInterestRate <= 0 || !is_numeric($annualInterestRate));

//creating new account
$myAccount = new SavingsAccount((float)$balance, (float)$annualInterestRate);

//validation. Must be number and higher than 0
do {
    $months = readline('How long has the account been opened? ');
} while ($months <= 0 || !is_numeric($months));

//For printing out month
$month = 1;

//money deposit/Withdrawn and MonthlyInterest calculation
do {
    do {
        $deposit = readline("Enter amount deposited for month: $month: ");
    } while ($deposit <= 0 || !is_numeric($deposit));
    $myAccount->deposit($deposit);

    do {
        $withdraw = readline("Enter amount withdrawn for month: $month: ");
    } while ($withdraw <= 0 || !is_numeric($withdraw));
    $myAccount->withdraw($withdraw);

    $myAccount->addMonthlyInterest();
    $month++;
    $months--;
} while ($months !== 0);

//echo out information
echo 'Total deposited: $' . number_format($myAccount->getDeposited(), 2) . PHP_EOL;
echo 'Total withdrawn: $' . number_format($myAccount->getWithdrawn(), 2) . PHP_EOL;
echo 'Interest earned: $' . number_format($myAccount->getInterestEarned(), 2) . PHP_EOL;
echo 'Ending balance: $' . number_format($myAccount->getBalance(), 2) . PHP_EOL;