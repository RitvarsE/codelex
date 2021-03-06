<?php

require_once 'Movie.php';
require_once 'Cinema.php';

$cinema = new Cinema([
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista International', 'PG13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'),
]);

//pielietoju getterus :D
foreach ($cinema->getPG($cinema->getMovies()) as $movie) {
    echo $movie->getTitle() . ' ' . $movie->getStudio() . ' ' . $movie->getRating() . PHP_EOL;
}