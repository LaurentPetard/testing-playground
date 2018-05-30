<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\Product;

class ProductRepository
{
    private $products = [];

    public function __construct(Product ...$products)
    {
        foreach ($products as $product)
        {
            $this->products[(string) $product->id()] = $products;
        }
    }

    public function get(ProductId $productId): Product
    {
        if (!isset($this->products[(string) $productId])) {
            throw new \InvalidArgumentException('product not found');
        }

        return $this->products[(string) $productId];
    }
}
