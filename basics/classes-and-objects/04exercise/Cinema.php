<?php

class Cinema
{
    private array $movies;


    public function __construct(array $movies)
    {
        foreach ($movies as $movie) {
            $this->addMovies($movie);
        }
    }

    public function getMovies(): array
    {
        return $this->movies;
    }

    private function addMovies(Movie $movie): void
    {
        $this->movies[] = $movie;
    }


}