<?php
$firstInteger = readline("Input first Integer: ");
$secondInteger = readline("Input second Integer: ");
function numbers15(int $firstInteger, int $secondInteger): bool
{
    return $firstInteger == 15 || $secondInteger == 15 || $firstInteger + $secondInteger == 15 || $firstInteger - $secondInteger == 15 || $secondInteger - $firstInteger == 15;
}

echo numbers15($firstInteger, $secondInteger) ? 'true' : 'Non of your input integers or their sum, or difference are 15.';