<?php


class Video
{
    private string $title;
    private bool $flag;
    private int $avgUserRating;


    public function __construct(string $title, bool $flag, int $avgUserRating)
    {
        $this->title = $title;
        $this->flag = $flag;
        $this->avgUserRating = $avgUserRating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isFlag(): bool
    {
        return $this->flag;
    }


    public function getAvgUserRating(): int
    {
        return $this->avgUserRating;
    }
}
