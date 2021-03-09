<?php


class Video
{
    private string $title;
    private bool $rented;
    private array $rating;

    public function __construct(string $title, array $rating = [50], bool $rented = false)
    {
        $this->title = $title;
        $this->rented = $rented;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isRented(): bool
    {
        return $this->rented;
    }


    public function getRating(): array
    {
        return $this->rating;
    }

    public function rent(): void
    {
        $this->rented = true;
    }

    public function return(): void
    {
        $this->rented = false;
    }

    public function avgRating(): int
    {
        return round(array_sum($this->getRating()) / count($this->getRating()));
    }

    public function setRating(int $rating): void
    {
        $this->rating[] = $rating;
    }
}
