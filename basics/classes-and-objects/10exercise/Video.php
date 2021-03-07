<?php


class Video
{
    private string $title;
    private bool $rented;
    private int $avgUserRating;

    public function __construct(string $title, int $avgUserRating = 50, bool $rented = false)
    {
        $this->title = $title;
        $this->rented = $rented;
        $this->avgUserRating = $avgUserRating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isRented(): bool
    {
        return $this->rented;
    }


    public function getAvgUserRating(): int
    {
        return $this->avgUserRating;
    }

    public function rent(): void
    {
        $this->rented = true;
    }

    public function return(): void
    {
        $this->rented = false;
    }
    public function setRating(int $rating): void
    {
        $this->avgUserRating = $rating;
    }
}
