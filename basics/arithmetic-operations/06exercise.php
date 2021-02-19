<?php
/*
 * Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
 * The program shall print "Coza" in place of the numbers which are multiples of 3,
 *  "Loza" for multiples of 5, "Woza" for multiples of 7,
 * "CozaLoza" for multiples of 3 and 5, and so on. The output shall look like:

1 2 Coza 4 Loza Coza Woza 8 Coza Loza 11
Coza 13 Woza CozaLoza 16 17 Coza 19 Loza CozaWoza 22
23 Coza Loza 26 Coza Woza 29 CozaLoza 31 32 Coza
 */
function cozalozawoza(int $endNumber): string
{
    $line = '';
    for ($x = 1; $x <= $endNumber; $x++) {
        if ($x % 11 === 0) {
            $line .= $x . PHP_EOL;
        } else if ($x % 15 === 0) {
            $line .= 'CozaLoza ';
        } else if ($x % 21 === 0) {
            $line .= 'CozaWoza ';
        } else if ($x % 35 === 0) {
            $line .= 'LozaWoza ';
        } else if ($x % 3 === 0) {
            $line .= 'Coza ';
        } else if ($x % 5 === 0) {
            $line .= 'Loza ';
        } else if ($x % 7 === 0) {
            $line .= 'Woza ';
        } else {
            $line .= $x . ' ';
        }
    }
    return $line;
}

echo cozalozawoza(110);