<?php

$wallet = [1 => 10, 2 => 5, 5 => 10, 10 => 5, 20 => 2, 50 => 1, 100 => 1, 200 => 1];
$type = [['Latte', 190], ['Cappuccino', 200], ['Black Tea', 100], ['Hot Water', 50], ['Triple Latte', 600]];

function walletTotal(array $wallet): int
{
    $walletTotal = 0;
    foreach ($wallet as $coin => $amount) {
        $walletTotal += $coin * $amount;
    }
    return $walletTotal;
}

function coinsLeft(array $wallet)
{
    echo 'Coins left: ';
    foreach ($wallet as $coin => $amount) {
        echo '€' . $coin / 100 . '-' . $amount . ' | ';
    }
    echo PHP_EOL;
}

function chooseCoffee(array $wallet, array $type)
{
    do {
        $x = 1;
        coinsLeft($wallet);
        echo PHP_EOL . 'Wallet total: €' . walletTotal($wallet) / 100 . PHP_EOL;
        foreach ($type as $price) {
            echo '[' . $x++ . '] ' . $price[0] . ' price: €' . $price[1] / 100 . PHP_EOL;
        }
        echo '[' . (count($type) + 1) . '] Exit' . PHP_EOL;
        $inputValue = readline('What coffee do you want: ');
        if (!checkInput($inputValue, $type)) {
            print("\033[2J\033[;H");
            echo PHP_EOL . 'Invalid Input.' . PHP_EOL;
        }
    } while (!checkInput($inputValue, $type));
    if ((count($type) + 1) == $inputValue) {
        echo 'See you next time, Good day!';
        exit;
    } elseif ($type[$inputValue - 1][1] < walletTotal($wallet)) {
        coinInter($wallet, $type, $inputValue);
    } else {
        echo 'You don`t have enough money!';
    }
}

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

function checkCoin(array $wallet, string $inputCoin): bool
{
    if (array_key_exists($inputCoin, $wallet)) {
        return true;
    }
    return false;
}

function checkCoinAmount(array $wallet, string $inputCoin): int
{
    if (checkCoin($wallet, $inputCoin)) {
        return $wallet[$inputCoin];
    } else {
        return 0;
    }
}

function coinInter(array $wallet, array $type, string $inputValue)
{
    $coinSum = 0;

    do {
        coinsLeft($wallet) . PHP_EOL;
        $inputCoin = readline('Input coin(1 = 1 cent, 100 = 1€): ');
        if (checkCoin($wallet, $inputCoin)) {
            if (checkCoinAmount($wallet, $inputCoin) > 0) {
                $coinSum += $inputCoin;
                print("\033[2J\033[;H");
                echo 'Sum inputted: €' . $coinSum / 100 . PHP_EOL . PHP_EOL;
                $wallet[$inputCoin] = $wallet[$inputCoin] - 1;
            } else {
                echo 'You don`t have €' . $inputCoin / 100 . ' coins anymore.' . PHP_EOL;
            }
        } else {
            echo 'Fraud coin detected, Input valid coins!' . PHP_EOL;
        }
    } while ($coinSum < $type[$inputValue - 1][1]);
    $change = ($coinSum - $type[$inputValue - 1][1]);
    returnCoins($wallet, $change);
    echo PHP_EOL . 'You bought: ' . $type[$inputValue - 1][0] . PHP_EOL . 'You have left €' . (walletTotal($wallet) + $change) / 100 . ' in your pocket.';
}

function returnCoins(array $wallet, int $change)
{
    while ($change > 0) {
        if ($change >= 200) {
            $wallet['200'] = $wallet['200'] + 1;
            $change = $change - 200;
        } elseif ($change >= 100) {
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
    coinsLeft($wallet);
}

chooseCoffee($wallet, $type);