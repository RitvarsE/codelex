<?php


class Track
{
    private int $length;

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function getLength(): int
    {
        return $this->length;
    }
    public function drawTrack(): string
    {
        return str_repeat('.', $this->length);
    }
}