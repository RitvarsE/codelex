<?php


class Shop
{
    private array $suppliers = [];

    public function addSupplier(Supplier $supplier): void
    {
        $this->suppliers[] = $supplier;
    }

    public function products(): ProductCollection
    {
        $products = new ProductCollection();

        foreach ($this->suppliers as $supplier) {
            $supplierProducts = $supplier->getProducts()->all();

            foreach ($supplierProducts as $barCode => ['product' => $product, 'amount' => $amount]) {
                $products->add(
                    new Product(
                        $product->getSellable(),
                        $product->getPrice() + ($product->getPrice() * 0.2),
                    ),
                    $amount
                );
            }
        }
        return $products;
    }


    public function sell(string $productName, int $howMuch): void
    {
        foreach ($this->products()->all() as $barCode => ['product' => $product, 'amount' => $amount]) {
            if ($productName === $product->getSellable()->getName()) {
                $this->getSupplier($productName)->buy($product->getSellable(), $howMuch);
            }
        }
    }

    public function getSupplier(string $productName): Supplier
    {
        foreach ($this->suppliers as $supplier) {
            $supplierProducts = $supplier->getProducts()->all();

            foreach ($supplierProducts as $barCode => ['product' => $product, 'amount' => $amount]) {
                if ($productName === $product->getSellable()->getName()) {
                    return $supplier;
                }
            }
        }
    }
}