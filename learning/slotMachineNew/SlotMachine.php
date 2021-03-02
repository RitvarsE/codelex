<?php

class SlotMachine1
{
    private array $lines = [];
    private array $elements;

    private int $verticalSlotsCount;
    private int $horizontalSlotsCount;


    public function __construct(
        array $elements,
        int $verticalSlotsCount = 3,
        int $horizontalSlotsCount = 3)
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }
        $this->verticalSlotsCount = $verticalSlotsCount;
        $this->horizontalSlotsCount = $horizontalSlotsCount;
    }

    public function roll(): void
    {
        for ($v = 0; $v < $this->verticalSlotsCount; $v++) {
            $this->lines[$v] = [];
            for ($h = 0; $h < $this->horizontalSlotsCount; $h++) {
                $randomElement = $this->elements[array_rand($this->elements)];
                $this->lines[$v][$h] = $randomElement;
            }
        }
    }

    public function lines(): array
    {
        return $this->lines;
    }

    private function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }
}