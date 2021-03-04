<?php


class Vegetables extends Fresh
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setFreshness(bool $freshOrNo): void
    {
        $this->isFresh = $freshOrNo;
    }
}