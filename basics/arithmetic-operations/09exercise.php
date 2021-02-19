<?php
/*
 * Write a program that calculates and displays a person's body mass index (BMI).
 * A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
 * Where weight is measured in pounds and height is measured in inches.
 * Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
 * A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
 * If the BMI is less than 18.5, the person is considered underweight.
 * If the BMI value is greater than 25, the person is considered overweight.

Your program must accept metric units.
 */
$weight = readline("Input your weight(kg): ");
$height = readline("Input your height(cm): ");
function calculateBMI(float $weight, float $height): string
{
    $poundsToKg = $weight * 2.205;
    $inchesToMetres = $height / 2.54;
    return $poundsToKg * 703 / pow($inchesToMetres, 2);
}

if (calculateBMI($weight, $height) <= 25 && calculateBMI($weight, $height) >= 18.5) {
    echo 'You have optimal BMI. Your BMI is: ' . number_format(calculateBMI($weight, $height), 1);
} else if (calculateBMI($weight, $height) < 18.5) {
    echo 'You are underweight. Your BMI is: ' . number_format(calculateBMI($weight, $height), 1);
} else {
    echo 'You are overweight. Your BMI is: ' . number_format(calculateBMI($weight, $height), 1);
}