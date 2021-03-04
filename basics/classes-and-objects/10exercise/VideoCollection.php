<?php


class VideoStore extends Application
{
    private array $movies = [];

    public function addMovies(Video $movie): void
    {
        $this->movies[] = $movie;
    }

    public function allMovies(): array
    {
        return $this->movies;
    }
}