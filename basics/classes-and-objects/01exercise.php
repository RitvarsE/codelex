<?php

class Product
{
    private string $name;
    private float $priceAtStart;
    private int $amountAtStart;

    public function __construct(string $name, float $priceAtStart, int $amountAtStart)
    {
        $this->name = $name;
        $this->priceAtStart = $priceAtStart;
        $this->amountAtStart = $amountAtStart;
    }

    public function printProduct(): string
    {
        return "'$this->name', price $this->priceAtStart, amount $this->amountAtStart";
    }

    public function setPriceAtStart(float $newPrice): void
    {
        $this->priceAtStart = $newPrice;
    }

    public function setAmountAtStart(int $newAmount): void
    {
        $this->amountAtStart = $newAmount;
    }
}
// izveidoju jaunus produktus

$mouse = new Product('Logitech mouse', 70.00, 14);
$iPhone = new Product('iPhone 5s', 999.99, 3);
$epson = new Product('Epson EB-U0', 70, 1);

//samainu vērtības

$mouse->setAmountAtStart(5);
$mouse->setPriceAtStart(15.5);

//izprintēju ārā visus produktus

echo $mouse->printProduct() . PHP_EOL;
echo $iPhone->printProduct() . PHP_EOL;
echo $epson->printProduct();