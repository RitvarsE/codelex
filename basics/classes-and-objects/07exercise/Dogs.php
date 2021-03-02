<?php


class Dogs
{
    private array $dogs;

    public function __construct(array $dogs)
    {
        foreach ($dogs as $dog) {
            $this->addDog($dog);
        }
    }

    public function getDogs(): array
    {
        return $this->dogs;
    }

    public function addMother(string $dogName, string $mother): void
    {
        foreach ($this->getDogs() as $dog) {
            if ($dog->getName() === $dogName) {
                $dog->setMother($mother);
            }
        }
    }

    public function addFather(string $dogName, string $father): void
    {
        foreach ($this->getDogs() as $dog) {
            if ($dog->getName() === $dogName) {
                $dog->setFather($father);
            }
        }
    }

    public function HasSameMotherAs(string $firstDogName, string $secondDogName): bool
    {
        $dogMother = [];
        foreach ($this->getDogs() as $dog) {
            if ($dog->getName() === $firstDogName && $dog->getMother() !== null) {
                $dogMother[] = $dog->getMother();
            }
            if ($dog->getName() === $secondDogName && $dog->getMother() !== null) {
                $dogMother[] = $dog->getMother();
            }
        }
        return count($dogMother) === 2 && count(array_unique($dogMother)) === 1;
    }

    private function addDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }


}