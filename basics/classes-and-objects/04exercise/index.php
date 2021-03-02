<?php

require_once 'Movie.php';
require_once 'Cinema.php';

$cinema = new Cinema([
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista International', 'PG13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'),
]);

foreach ($cinema->getMovies() as $movie) {
    if ($movie->getRating() === 'PG') {
        echo 'Movie: "'. $movie->getTitle() . '" Studio: ' . $movie->getStudio() . ' Rating: ' . $movie->getRating() . PHP_EOL;
    }
}