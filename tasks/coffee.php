<?php

$wallet = [1 => 10, 2 => 5, 5 => 10, 10 => 5, 20 => 2, 50 => 1, 100 => 1, 200 => 1];
$type = [['Latte', 190], ['Cappuccino', 200], ['Black Tea', 100], ['Hot Water', 50], ['Triple Latte', 600]];

//kopējais maka daudzums
function walletTotal(array $wallet): int
{
    $walletTotal = 0;
    foreach ($wallet as $coin => $amount) {
        $walletTotal += $coin * $amount;
    }
    return $walletTotal;
}

//pārbaudu ievadi
function checkInput(string $inputValue, array $type): bool
{
    if (strlen($inputValue) > 1 ||
        !is_numeric($inputValue) ||
        $inputValue > (count($type) + 1) ||
        $inputValue < 1) {
        return false;
    }
    return true;
}

//pārbaudu vai monēta eksistē arraya
function checkCoin(array $wallet, string $inputCoin): bool
{
    if (array_key_exists($inputCoin, $wallet)) {
        return true;
    }
    return false;
}

// pārbaudu monētas daudzumu
function checkCoinAmount(array $wallet, string $inputCoin): int
{
    if (checkCoin($wallet, $inputCoin)) {
        return $wallet[$inputCoin];
    } else {
        return 0;
    }
}

function yourCoins(array $wallet): string
{
    $string = '';
    foreach ($wallet as $coin => $amount) {
        $string .= '€' . $coin / 100 . '-' . $amount . ' | ';
    }
    return 'Your coins: ' . $string;
}

// izpildu kafijas izvēli
do {
    echo yourCoins($wallet);

    echo PHP_EOL . 'Wallet total: €' . walletTotal($wallet) / 100 . PHP_EOL;
    $counter = 1;
    foreach ($type as $price) {
        echo '[' . $counter++ . '] ' . $price[0] . ' price: €' . $price[1] / 100 . PHP_EOL;
    }

    echo '[' . (count($type) + 1) . '] Exit' . PHP_EOL;

    $inputValue = readline('What coffee do you want: ');

    if (!checkInput($inputValue, $type)) {
        print("\033[2J\033[;H");
        echo PHP_EOL . 'Invalid Input.' . PHP_EOL;
    }
    echo 'You chose: ' . $type[$inputValue - 1][0] . '. Price: €' . $type[$inputValue - 1][1] / 100 . PHP_EOL;
} while (!checkInput($inputValue, $type));


if ((count($type) + 1) == $inputValue) {
    echo 'See you next time, Good day!';
    exit;
} elseif ($type[$inputValue - 1][1] < walletTotal($wallet)) {
    $coinSum = 0;
// ievietoju monētas
    do {
        $inputCoin = readline('Input coin(1 = 1 cent, 100 = 1€): ');

        if (checkCoin($wallet, $inputCoin)) {

            if (checkCoinAmount($wallet, $inputCoin) > 0) {
                $coinSum += $inputCoin;
                $wallet[$inputCoin] = $wallet[$inputCoin] - 1;
                print("\033[2J\033[;H");
                echo yourCoins($wallet) . PHP_EOL;

                if ($type[$inputValue - 1][1] - $coinSum < 0) {
                    echo 'Inputted: €' . $coinSum / 100 . ". Change: €" . ($type[$inputValue - 1][1] - $coinSum) / 100 * -1 . PHP_EOL;
                } else {
                    echo 'Inputted: €' . $coinSum / 100 . ". Left to input: €" . ($type[$inputValue - 1][1] - $coinSum) / 100 . PHP_EOL;
                }
            } else {
                echo 'You don`t have €' . $inputCoin / 100 . ' coins anymore.' . PHP_EOL;
            }
        } else {
            echo 'Fraud coin detected, Input valid coins!' . PHP_EOL;
        }
    } while ($coinSum < $type[$inputValue - 1][1]);
    $change = ($coinSum - $type[$inputValue - 1][1]);

    while ($change > 0) {
        if ($change >= 100) {
            $wallet['100'] = $wallet['100'] + 1;
            $change = $change - 100;
        } elseif ($change >= 50) {
            $wallet['50'] = $wallet['50'] + 1;
            $change = $change - 50;
        } elseif ($change >= 20) {
            $wallet['20'] = $wallet['20'] + 1;
            $change = $change - 20;
        } elseif ($change >= 10) {
            $wallet['10'] = $wallet['10'] + 1;
            $change = $change - 10;
        } elseif ($change >= 5) {
            $wallet['5'] = $wallet['5'] + 1;
            $change = $change - 5;
        } elseif ($change >= 2) {
            $wallet['2'] = $wallet['2'] + 1;
            $change = $change - 2;
        } elseif ($change >= 1) {
            $wallet['1'] = $wallet['1'] + 1;
            $change = $change - 1;
        }
    }
    echo PHP_EOL . 'You bought: ' . $type[$inputValue - 1][0] . PHP_EOL . 'You have left €' . (walletTotal($wallet) + $change) / 100 . ' in your pocket.';
} else {
    echo 'You don`t have enough money for: ' . $type[$inputValue - 1][0] . '!';
}