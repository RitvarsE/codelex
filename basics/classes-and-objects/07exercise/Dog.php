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
        if ($this->mother === null) return 'unknown';
        return $this->mother;
    }

    public function getFather(): string
    {
        if ($this->father === null) return 'unknown';
        return $this->father;
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