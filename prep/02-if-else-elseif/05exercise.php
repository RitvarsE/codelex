<?php
/*
 * Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
Range should be stored within the 2 separated variables $y and $z.
 */
$x = 50;
$y = 10;
$z = 100;

if ($x < $z && $x > $y) {
    echo 'correct';
}