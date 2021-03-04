<?php


class Dog
{
    private string $name;
    private string $sex;
    private ?Dog $mother = null;
    private ?Dog $father = null;

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

    public function getMother(): ?Dog
    {
        return $this->mother;
    }

    public function getFather(): ?Dog
    {
        return $this->father;
    }


    public function setMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father;
    }

    public function HasSameMotherAs(Dog $name): bool
    {
        return !($this->getMother() === null || $name->getMother() === null || $this->getMother() !== $name->getMother());
    }

}