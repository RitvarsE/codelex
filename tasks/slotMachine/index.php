<?php
require_once 'SlotMachine.php';
do {
    $moneyToPlay = readline('Starting sum: ');
    if (is_numeric($moneyToPlay) && $moneyToPlay % 10 === 0) {
        if (fmod($moneyToPlay, 1) == 0) {
            $moneyToPlay;
        } else {
            $moneyToPlay = '';
        }
    } else {
        $moneyToPlay = '';
    }
} while (!is_numeric($moneyToPlay));
$symbols = new SlotMachine('Symbols');
$symbols->setBalance($moneyToPlay);
echo 'Your sum: ' . $symbols->getBalance() . PHP_EOL;

do {
    $bet = readline('Choose your bet(Increment 10): ');
    if ($bet <= $symbols->getBalance() && is_numeric($bet) && $bet % 10 === 0) {
        if (fmod($bet, 1) == 0) {
            $bet;
        } else {
            $bet = '';
        }
    } else {
        $bet = '';
    }
} while (!is_numeric($bet));
$symbols->setBet($bet);
while ($symbols->getBalance() >= $symbols->getBet()) {
    $symbols->game();
    echo implode(' ', $symbols->getGameBoard()[0]) . PHP_EOL;
    sleep(1);
    echo implode(' ', $symbols->getGameBoard()[1]) . PHP_EOL;
    sleep(1);
    echo implode(' ', $symbols->getGameBoard()[2]) . PHP_EOL;
    sleep(1);
    $symbols->checkLine();
    $symbols->freeGame();
    echo 'Your sum: ' . $symbols->getBalance() . PHP_EOL;
    $continue = readline('Continue?(y/n) ');
    if ($continue === 'y') {
        $changeBet = readline('Change bet(y/n). Your bet: ' . $symbols->getBet() . ': ');
        if ($changeBet == 'y') {
            do {
                $bet = readline('Choose your bet(Increment 10): ');
                if ($bet <= $symbols->getBalance() && is_numeric($bet) && $bet % 10 === 0) {
                    if (fmod($bet, 1) == 0) {
                        $bet;
                    } else {
                        $bet = '';
                    }
                } else {
                    $bet = '';
                }
            } while (!is_numeric($bet));
            $symbols->setBet($bet);
        }
    } else {
        echo 'See you next time. Withdraw: ' . $symbols->getBalance();
        break;
    }
}





//Sapratu, ka jātaisa atsevišķi viss, lai šeit ir echo nevis klasēs, bet nepietika laiks, lai ko tādu izdarītu.