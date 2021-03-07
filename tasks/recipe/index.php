<?php

/*X:2
 * tomato
 * cucumber
 *
 * Recipe - tomato,eggs, cucumber, banana // TurboSalad
 * Recipe tomato, nuts / NotTurboSalad
 *
 * With Tomato I can make TurboSalad, NotTurboSalad
 * TurboSalad: Missing: eggs, banana
 * NotTurboSalad: Missing: nuts;
 */

require_once 'Recipe.php';
require_once 'Recipes.php';
require_once 'Ingredients.php';
require_once 'Ingredient.php';


$recipeBook = new Recipes([
    $breakfast = new Recipe('Breakfast', ['tomato', 'cucumber', 'chicken', 'carrot']),
    $lunch = new Recipe('Lunch', ['beef', 'paprika', 'radish', 'potato']),
    $dinner = new Recipe('Dinner', ['pork', 'potato', 'chicken', 'jalapeno']),
    $afternoonSnack = new Recipe('Afternoon Snack', ['salad', 'tomato', 'cabbage']),
    $snack = new Recipe('Snack', ['paprika', 'chicken']),
]);

$ingredients = new Ingredients([]);

do {
    $ingredient = strtolower(readline("What is in your fridge?(input by 1) (type 'none' if you don`t have anything else) "));
    if ($ingredient === 'none') {
        break;
    }
    if (!ctype_alpha($ingredient)) {
        echo 'Input proper ingredients';
        continue;
    }

    $ingredients->addIngredient(new Ingredient($ingredient));
} while ($ingredient !== 'none');


//skaitītājs, lai varētu izprintēt paziņojumu, ja nevar neko taisīt.
$counter = 0;

// Pārbaudīšana.

foreach ($recipeBook->allRecipes() as $recipe) {

    $haveTheseIngredients = array_intersect($recipe->getIngredients(), $ingredients->ingredientNames());

    if ($haveTheseIngredients === $recipe->getIngredients()) {
        echo PHP_EOL . 'You have everything to make: ' . $recipe->getName() . PHP_EOL;
        $counter++;
    } elseif (count($haveTheseIngredients) > 0) {
        echo PHP_EOL . 'You can try to make: ' . $recipe->getName();
        echo '. You have: ' . implode(', ', $haveTheseIngredients);
        echo '. You still need: ';
        echo implode(', ', array_diff($recipe->getIngredients(), $ingredients->ingredientNames())) . PHP_EOL;
        $counter++;
    }
}

if ($counter === 0) {
    echo 'You can`t make anything with your ingredients.';
}
