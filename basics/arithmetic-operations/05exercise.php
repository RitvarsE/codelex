<?php
$cpuChoice = rand(1, 100);
$myChoice = readline("Guess the number between 1 and 100: ");

function didIGuess(int $cpuChoice, int $myChoice): string
{
    if ($myChoice > 100 || $myChoice < 1) {
        echo 'Your number must be between 1 and 100';
        exit;
    } else {
        if ($cpuChoice == $myChoice) {
            return 'You guessed it!  What are the odds?!?';
        } else if ($cpuChoice > $myChoice) {
            return 'Sorry, you are too low. My number is ' . $cpuChoice;
        } else {
            return 'Sorry, you are too high. My number is ' . $cpuChoice;
        }
    }
}

echo didIGuess($cpuChoice, $myChoice);
