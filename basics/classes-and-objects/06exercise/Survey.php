<?php


class Survey
{
    private int $surveyed;
    private float $purchasedEnergyDrinks;
    private float $preferCitrusDrinks;


    public function __construct(int $surveyed, float $purchasedEnergyDrinks, float $preferCitrusDrinks)
    {
        $this->surveyed = $surveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrusDrinks = $preferCitrusDrinks;
    }


    public function getSurveyed(): int
    {
        return $this->surveyed;
    }


    public function getPurchasedEnergyDrinks(): float
    {
        return $this->purchasedEnergyDrinks;
    }


    public function getPreferCitrusDrinks(): float
    {
        return $this->preferCitrusDrinks;
    }

    public function calculateEnergyDrinkers(): int
    {
        return round($this->getSurveyed() * $this->getPurchasedEnergyDrinks());
    }

    public function calculatePreferCitrus(): int
    {
        return round($this->calculateEnergyDrinkers() * $this->getPreferCitrusDrinks());
    }
}