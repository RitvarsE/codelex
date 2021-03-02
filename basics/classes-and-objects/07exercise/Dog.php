<?php


class Dog
{
    private string $name;
    private string $sex;
    private ?string $mother = null;
    private ?string $father = null;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getMother(): string
    {
        return $this->mother ?? 'unknown';
    }

    public function getFather(): string
    {
        return $this->father ?? 'unknown';
    }

    public function setMother(string $mother): void
    {
        $this->mother = $mother;
    }

    public function setFather(string $father): void
    {
        $this->father = $father;
    }


}