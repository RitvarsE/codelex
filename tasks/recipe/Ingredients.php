<?php


class Ingredients
{
    private array $ingredients;
    private array $ingredientNames = [];

    public function __construct(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function addIngredient(Ingredient $ingredient): void
    {
        $this->ingredients[] = $ingredient;
    }

    public function allIngredients(): array
    {
        return $this->ingredients;
    }

    public function ingredientNames(): array
    {
        foreach ($this->allIngredients() as $ingredient) {
            $this->ingredientNames[] = $ingredient->getName();
        }
        return $this->ingredientNames;
    }
}