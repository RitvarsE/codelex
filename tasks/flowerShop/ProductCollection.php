<?php


class ProductCollection
{
    private array $products = [];

    public function __construct()
    {

    }

    public function add(Product $product, int $amount = 1): void
    {
        $barCode = $product->barCode();

        if (isset($this->products[$barCode])) {
            $this->products[$barCode]['amount'] += $amount;
            return;
        }
        $this->products[$barCode] = [
            'product' => $product,
            'amount' => $amount
        ];
    }

    public function sell(Product $product, int $amount): void
    {
        $barCode = $product->barCode();

        if (isset($this->products[$barCode])) {
            $this->products[$barCode]['amount'] -= $amount;
            return;
        }
    }


    public function all(): array
    {
        return $this->products;
    }


}