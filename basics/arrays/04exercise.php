<?php
$array = [];
for ($x = 0; $x < 10; $x++) {
    array_push($array, rand(1, 100));
}
$arrayCopy = $array;
array_pop($array);
array_push($array, -7);
echo 'Array1: ' . implode(',', $array) . PHP_EOL;
echo 'Array2: ' . implode(',', $arrayCopy);
