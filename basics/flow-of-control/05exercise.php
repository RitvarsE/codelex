<?php

$string = strtoupper(readline('Input your string: '));

if (ctype_alpha($string)) {

    foreach (str_split($string) as $character) {
        if (strpbrk('ABC', $character)) {
            echo str_repeat('2', strpos('ABC', $character) + 1);
        } elseif (strpbrk('DEF', $character)) {
            echo str_repeat('3', strpos('DEF', $character) + 1);
        } elseif (strpbrk('GHI', $character)) {
            echo str_repeat('4', strpos('GHI', $character) + 1);
        } elseif (strpbrk('JKL', $character)) {
            echo str_repeat('5', strpos('JKL', $character) + 1);
        } elseif (strpbrk('MNO', $character)) {
            echo str_repeat('6', strpos('MNO', $character) + 1);
        } elseif (strpbrk('PQRS', $character)) {
            echo str_repeat('7', strpos('PQRS', $character) + 1);
        } elseif (strpbrk('TUV', $character)) {
            echo str_repeat('8', strpos('TUV', $character) + 1);
        } elseif (strpbrk('WXYZ', $character)) {
            echo str_repeat('9', strpos('WXYZ', $character) + 1);
        }

    }
} else {
    echo 'Invalid input';
}