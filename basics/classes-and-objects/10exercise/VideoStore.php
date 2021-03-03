<?php


class VideoStore extends Application
{
    private array $movies = [];


    public function __construct(array $movies)
    {
        foreach ($this->movies as $movie) {
            $movies[] = $movie;
        }
    }

    public function addMovies(Video $movie): array
    {
        $this->movies[] = $movie;
    }
}