<?php
require_once 'SlotMachine.php';

//pārbaude uz to, lai nauda ir skaitlis.
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

//jauna objekta izveide un naudas ievietošana
$symbols = new SlotMachine('Symbols');
$symbols->startBalance($moneyToPlay);

echo 'Your sum: ' . $symbols->getBalance() . PHP_EOL;

//betošanas funkcija
function inputBet(object $symbols): void
{
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

//bet ievietošana
inputBet($symbols);

//spēle kamēr atlikums ir mazāks par 0

while ($symbols->getBalance() > 0) {
    $symbols->game();
    echo implode(' ', $symbols->getGameBoard()[0]) . PHP_EOL;
    sleep(1);
    echo implode(' ', $symbols->getGameBoard()[1]) . PHP_EOL;
    sleep(1);
    echo implode(' ', $symbols->getGameBoard()[2]) . PHP_EOL;
    sleep(1);

    //pārbaudu uzvarēšanas iespējas

    $symbols->checkLine();
    echo 'Your sum: ' . $symbols->getBalance() . PHP_EOL;

    //pārbaudu freegame

    if ($symbols->getFreeGame() > 0) {
        for ($x = 0; $x < 5; $x++) {
            $symbols->game();
            $symbols->setBalance();
            echo implode(' ', $symbols->getGameBoard()[0]) . PHP_EOL;
            sleep(1);
            echo implode(' ', $symbols->getGameBoard()[1]) . PHP_EOL;
            sleep(1);
            echo implode(' ', $symbols->getGameBoard()[2]) . PHP_EOL;
            sleep(1);
            $symbols->setFreeGame();
            $symbols->checkLine();
            echo 'Your sum: ' . $symbols->getBalance() . PHP_EOL;
        }
    }
    // ja atlikums ir nulle, tad spēle beidzas

    if ($symbols->getBalance() == 0) {
        echo 'You lost all your money!';
        break;
    }

    $continue = readline('Continue?(y/n) ');

    if ($continue === 'y') {

        if ($symbols->getBalance() < $symbols->getBet()) {
            echo 'Your bet is higher than your balance, please change it.' . PHP_EOL;
            inputBet($symbols);
        } else {
            $changeBet = readline('Change bet(y/n). Your bet: ' . $symbols->getBet() . ': ');
            if ($changeBet == 'y') {
                inputBet($symbols);
            }
        }

    } else {
        echo 'See you next time. Withdraw: ' . $symbols->getBalance();
        break;
    }
}
//iespējams freegame nestrādās, ja freegame laikā izmetīs vēlreiz.