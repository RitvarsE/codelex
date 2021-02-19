<?php
$numbers = [
    5,
    6,
    15,
    20,
    35,
    33,
    99,
    153,
    184,
    198
];
foreach ($numbers as $values) {
    if ($values % 3 === 0) {
        echo $values . "\n";
    }
}