<?php
/*
 * Write a console program in a class named NumberSquare that prompts the user for two integers,
 *  a min and a max, and prints the numbers in the range from min to max inclusive in a square pattern.
 *  Each line of the square consists of a wrapping sequence of integers increasing from min and max.
 * The first line begins with min, the second line begins with min + 1, and so on.
 * When the sequence in any line reaches max, it wraps around back to min.
 * You may assume that min is less than or equal to max. Here is an example dialogue:
 * Min? 1
Max? 5
12345
23451
34512
45123
51234
 */
$string = [];
$startNumber = readline('Input start number: ');
$endNumber = readline('Input end number: ');

//pārbaudu vai ir vesels cipars, cipars un vai ir pozitīvs cipars
if (fmod((float)$startNumber, 1) == 0 && is_numeric($startNumber) &&
    fmod((float)$endNumber, 1) == 0 && is_numeric($endNumber) &&
    $startNumber > 0 && $endNumber > 0) {

// pārbaudu vai start numurs ir mazāks par beigu
    if ($endNumber >= $startNumber) {

        for ($x = $startNumber; $x <= $endNumber; $x++) {
            array_push($string, $x);
        }

        echo implode('', $string) . PHP_EOL;

//ņemu ārā pirmo elementu, pielieku viņu beigās un printēju uz konsoli, kamēr pēdējais elements nav pirmais.
        while ($string[0] !== (int)$endNumber) {
            $firstElement = array_shift($string);
            array_push($string, $firstElement);
            echo implode('', $string) . PHP_EOL;
        }
    } else {
        echo 'Start number must be lower than end number.';
    }
} else {
    echo 'You must input valid numbers.';
}
