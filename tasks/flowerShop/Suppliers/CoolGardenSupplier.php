<?php


class CoolGardenSupplier implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection();
        $this->products->add(new Product(new Flower('Tulip'), 10), 200);
        $this->products->add(new Product(new Flower('Rose'), 5), 100);
        $this->products->add(new Product(new Balloon('Red Balloon'), 200), 5);
    }

    public function buy(object $productName, int $howMuch): void
    {
        foreach ($this->products->all() as $barCode => ['product' => $product, 'amount' => $amount]) {
            if ($productName === $product->getSellable()) {
                $this->products->sell($product, $howMuch);
            }
        }
    }

    public function getProducts(): ProductCollection
    {
        return $this->products;
    }
}