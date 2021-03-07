<?php


class Recipes
{
    private array $recipes;

    public function __construct(array $recipes)
    {
        foreach ($recipes as $recipe) {
            $this->addRecipe($recipe);
        }
    }

    public function addRecipe(Recipe $recipe): void
    {
        $this->recipes[] = $recipe;
    }

    public function allRecipes(): array
    {
        return $this->recipes;
    }

}