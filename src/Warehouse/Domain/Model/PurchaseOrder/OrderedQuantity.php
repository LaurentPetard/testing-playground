<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder;

use Webmozart\Assert\Assert;

class OrderedQuantity
{
    private $quantity;

    public function __construct(int $quantity)
    {
        Assert::greaterThan($quantity, 0);

        $this->quantity = $quantity;
    }
}
