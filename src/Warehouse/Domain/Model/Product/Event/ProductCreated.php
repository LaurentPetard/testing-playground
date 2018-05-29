<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\Product\Event;

use Warehouse\Domain\Model\Product\ProductId;

class ProductCreated
{
    private $productId;

    private $name;

    public function __construct(ProductId $productId, string $name)
    {
        $this->productId = $productId;
        $this->name = $name;
    }
}
