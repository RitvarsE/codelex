<?php
echo "Geometry Calculator" . PHP_EOL;
echo "1. Calculate the Area of a Circle" . PHP_EOL;
echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
echo "3. Calculate the Area of a Triangle" . PHP_EOL;
echo "4. Quit" . PHP_EOL;
$yourChoice = readline('Enter your choice (1-4): ');

class Geometry
{
    static function areOfCircle(float $radius): float
    {
        return pi() * $radius * 2;
    }

    static function areaOfRectangle(float $length, float $width): float
    {
        return $length * $width;
    }

    static function areOfTriangle(float $base, float $height): float
    {
        return $base * $height * 0.5;
    }
}


if ($yourChoice < 1 || $yourChoice > 4) {
    echo 'Error, you must input number between 1 and 4';
} else if ($yourChoice == 1) {
    $radius = readline('Input radius to calculate are of circle(Input positive numbers): ');
    if ($radius < 0) {
        echo 'Error, You must enter positive numbers';
    } else {
        echo Geometry::areOfCircle($radius);
    }
} elseif ($yourChoice == 2) {
    $Length = readline("Input length of rectangle(Input positive numbers): ");
    $Width = readline("Input width of rectangle(Input positive numbers): ");
    if ($Length < 0 || $Width < 0) {
        echo 'Error, You must enter positive numbers';
    } else {
        echo Geometry::areaOfRectangle($Length, $Width);
    }
} elseif ($yourChoice == 3) {
    $base = readline("Input base of your triangle(Input positive numbers): ");
    $height = readline("Input height of your triangle(Input positive numbers): ");
    if ($base < 0 || $height < 0) {
        echo 'Error, You must enter positive numbers';
    } else {
        echo Geometry::areOfTriangle($base, $height);
    }
} else {
    echo "You quited my cool Geometry Calculator.";
}
// biju sākumā uztaisījis visu ar do while loopu, kur, ja ir ievadīta izvēle zem 1 vai 4 vai arī negatīvi parametri, tad prasa vēlreiz vadīt
// bet tas būtu kā labāk, bet neatbilstu uzdevumam. Pārtaisīju visu, lai izvada erroru.