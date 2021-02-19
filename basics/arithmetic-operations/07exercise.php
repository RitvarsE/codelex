<?php
function computePosition(int $time): string
{
    return 0.5 * -9.81 * pow($time, 2) + 0 * $time + 0 . 'm';
}

echo computePosition(10);