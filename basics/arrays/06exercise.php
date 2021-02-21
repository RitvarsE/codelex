<?php
$words = [
    'china',
    'russia',
    'chile',
    'ukraine',
    'australia',
    'moldova',
    'finland',
    'argentina',
    'luxembourg',
    'afghanistan',
    'malta',
    'austria',
    'jamaica',
    'iraq',
    'netherlands',
    'andorra',
    'cameroon',
    'romania'
];
function guessWord($words)
{
    $randomWord = array_rand($words);
    $word = $words[$randomWord];
    $unGuessedLetters = '';
    $inputLetter = null;
    $guessTemplate = str_repeat(' _', strlen($word));
    $livesLeft = 5;
    while ($word !== str_replace(' ', '', $guessTemplate)) {
        echo str_repeat('=-', strlen($word) * 2) . PHP_EOL .
            'Word: ' . $guessTemplate . PHP_EOL .
            'Misses: ' . $unGuessedLetters . PHP_EOL .
            'Guess: ' . strtolower($inputLetter) . PHP_EOL .
            'Lives Left: ' . $livesLeft . PHP_EOL;
        $inputLetter = readline('Guess the word, input letter: ');
        if (strpos($guessTemplate, $inputLetter) !== false) {
            echo '***YOU ALREADY GUESSED THIS LETTER, TRY ANOTHER***' . PHP_EOL;
        }
        if (strlen($inputLetter) !== 1) {
            echo '***YOU MUST INPUT ONLY ONE LETTER***' . PHP_EOL;
        } elseif (strpos($unGuessedLetters, $inputLetter) !== false) {
            echo "***YOU ALREADY TRIED '$inputLetter', TRY ANOTHER LETTER***" . PHP_EOL;
        } elseif (!ctype_alpha($inputLetter)) {
            echo '*** YOU MUST USE ONLY ALPHABETIC LETTERS***' . PHP_EOL;
        } elseif (strpos($word, $inputLetter) === false) {
            $unGuessedLetters .= strtolower($inputLetter);
            $livesLeft--;
        }
        if (strlen($unGuessedLetters) > 4) {
            echo 'You lost, you had 5 wrong guesses. The word was: ' . ucfirst($word) . PHP_EOL;
            playAgain($words);
        }
        for ($x = 0; $x < strlen($word); $x++) {
            if (strtolower($inputLetter) === $word[$x]) {
                $guessTemplate[$x * 2 + 1] = strtolower($inputLetter);
            }
        }
    }
    echo 'Congratulations, you guessed the word: ' . ucfirst($word) . PHP_EOL;
    playAgain($words);
}

guessWord($words);
function playAgain($words)
{
    $whatToDo = readline("Do you want to play again(Y/N): ");
    if (strtolower($whatToDo) === 'y') {
        guessWord($words);
    } else {
        echo 'See you next time, buddy!';
        exit;
    }
}