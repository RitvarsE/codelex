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

    private function addDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }


}