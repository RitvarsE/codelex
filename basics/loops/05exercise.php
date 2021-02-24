<?php
/*
 * Write a console program in a class named Piglet that implements a simple 1-player dice game called "Piglet"
 * (based on the game "Pig"). The player's goal is to accumulate as many points as possible without rolling a 1.
 *  Each turn, the player rolls the die; if they roll a 1, the game ends and they get a score of 0.
 * Otherwise, they add this number to their running total score.
 *  The player then chooses whether to roll again, or end the game with their current point total.
 * Here is an example dialogue where the user plays until rolling a 1, which ends the game with 0 points:
 */
$sum = 0;
$sum += rand(1, 6);
echo 'Welcome to Piglet!' . PHP_EOL . 'You rolled a ' . $sum . '!' . PHP_EOL;
if ($sum === 1) {
    echo '0 points. You lost!';
    exit;
}
do {
    $input = readline('Roll again? y/n ');
    $random = rand(1, 6);
    if ($input !== 'y') {
        echo 'You have: ' . $sum . '. Try to get more next game!';
    } elseif ($random === 1) {
        echo 'You rolled 1. You have 0 points. You lost!';
        exit;
    } else {
        $sumCopy = $sum;
        $sum += $random;
        echo 'You rolled a ' . ($sum - $sumCopy) . PHP_EOL . 'sum: ' . $sum . ' copysum: ' . $sumCopy . PHP_EOL;
    }
} while ($input === 'y');