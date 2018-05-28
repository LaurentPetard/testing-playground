<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder;

use Webmozart\Assert\Assert;

class ReceivedQuantity
{
    private $quantity;

    public function __construct(int $quantity)
    {
        Assert::greaterThanEq($quantity, 0);

        $this->quantity = $quantity;
    }
}
