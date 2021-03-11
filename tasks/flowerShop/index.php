<?php
//0: Shop, Flower, FlowerCollection, XSupplier, YSupplier;
//I: Supplier

require_once 'Sellable.php';
require_once 'Sellables/Flower.php';
require_once 'Sellables/Balloon.php';
require_once 'Product.php';
require_once 'ProductCollection.php';
require_once 'Shop.php';
require_once 'Suppliers/Supplier.php';
require_once 'Suppliers/CoolGardenSupplier.php';
require_once 'Suppliers/AmazingGardenSupplier.php';
require_once 'Suppliers/CheapSupplier.php';

$shop = new Shop();
$shop->addSupplier(new AmazingGardenSupplier);
$shop->addSupplier(new CoolGardenSupplier);
$shop->addSupplier(new CheapSupplier);

//Print product List:
foreach ($shop->products()->all() as ['product' => $product, 'amount' => $amount]) {
    echo $product->getSellable()->getName() . ' price: $';
    echo number_format($product->getPrice(), 2) . ' ' . $amount . PHP_EOL;
}

$whatSex = strtolower(readline('Are you male or female? '));
$productName = ucfirst(strtolower(readline('Input Product name: ')));

$productNames = [];

foreach ($shop->products()->all() as ['product' => $product, 'amount' => $amount]) {

    $productNames[] = $product->getSellable()->getName();
    if ($productName === $product->getSellable()->getName()) {
        do {
            $howMuch = readline('How much do you want? ');
        } while (!is_numeric($howMuch) || $howMuch < 0);

        if ((int)$howMuch <= $amount) {
            $shop->sell($productName, $howMuch);
            echo PHP_EOL;
            echo 'You bought ' . $productName . ', for total: $';
            echo number_format($whatSex !== 'female' ? $product->getPrice() * $howMuch
                : ($product->getPrice() * $howMuch) * 0.8, 2);
            echo PHP_EOL;
        } else {
            echo 'We don`t have that much in our store' . PHP_EOL;
        }
    }
}

if (!in_array($productName, $productNames, true)) {
    echo 'Sorry, we don`t have this product in our store' . PHP_EOL;
}

echo PHP_EOL;
foreach ($shop->products()->all() as ['product' => $product, 'amount' => $amount]) {
    echo $product->getSellable()->getName() . ' price: $';
    echo number_format($product->getPrice(), 2) . ' ' . $amount . PHP_EOL;
}



