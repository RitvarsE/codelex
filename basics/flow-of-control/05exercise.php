<?php

$keypad = [2 => 'ABC', 3 => 'DEF', 4 => 'GHI', 5 => 'JKL', 6 => 'MNO', 7 => 'PQRS', 8 => 'TUV', 9 => 'WXYZ'];
$string = readline('Input your string: ');

function PhoneKeyPad(string $string, array $keypad): string
{
    $line = '';
    if (ctype_alpha($string)) {
        foreach (str_split($string) as $character) {
            foreach ($keypad as $number => $characters) {
                if (strlen(strpbrk($characters, strtoupper($character))) > 0) {
                    $line .= str_repeat($number, (stripos($characters, $character) + 1));
                }
            }
        }
        return $line;
    }
    return 'Invalid input';
}

echo PhoneKeyPad($string, $keypad);