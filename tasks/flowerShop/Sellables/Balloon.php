<?php

//name
class Balloon implements Sellable
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

    public function id(): string
    {
        return 'BALLOON_' . $this->getName();
    }

}