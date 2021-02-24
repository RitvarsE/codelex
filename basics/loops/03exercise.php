<?php
/*
 * Enter first word:
turtle
Enter second word
153
turtle....................153
 */
$firstWord = readline('Input first word: ');
$secondWord = readline('Input second word: ');
echo $firstWord;
for ($x = 0; $x < (30 - (strlen($firstWord) + strlen($secondWord))); $x++) {
    echo '.';
}
echo $secondWord;