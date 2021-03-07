<?php


class VideoCollection
{
    private array $videos = [];

    public function addVideo(Video $video): void
    {
        $this->videos[] = $video;
    }

    public function allVideos(): array
    {
        return $this->videos;
    }

    public function rentVideo(string $title): void
    {
        foreach ($this->allVideos() as $video) {
            if ($video->getTitle() === $title && $video->isRented() === false) {
                $video->rent();
            }
        }
    }


    public function returnVideo(string $title): void
    {
        foreach ($this->allVideos() as $video) {
            if ($video->getTitle() === $title && $video->isRented() === true) {
                $video->return();
            }
        }
    }

    public function listInventory(): string
    {
        $listInventory = '';
        foreach ($this->allVideos() as $video) {
            $listInventory .= 'Title: ' . $video->getTitle() .
                ' | Rating: ' . $video->avgRating() .
                ' | Rented: ' . ($video->isRented() ? 'yes' : 'no') . PHP_EOL;
        }
        return $listInventory;
    }

    public function setRating(string $title, int $rating): void
    {
        foreach ($this->allVideos() as $video) {
            if ($video->getTitle() === $title) {
                $video->setRating($rating);
            }
        }
    }
}