<?php


class CheapSupplier implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection();
        $this->products->add(new Product(new Flower('Daisy'), 10), 200);
        $this->products->add(new Product(new Flower('Orchid'), 5), 100);
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