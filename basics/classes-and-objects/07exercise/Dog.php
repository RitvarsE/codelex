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

    public function getMother(): string
    {
        if ($this->mother === null) {
            return 'unknown';
        }
        return $this->mother->getName();
    }

    public function getFather(): string
    {
        if ($this->father === null) {
            return 'unknown';
        }
        return $this->father->getName();
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
        return !($this->getMother() === 'unknown' || $name->getMother() === 'unknown' || $this->getMother() !== $name->getMother());
    }

}