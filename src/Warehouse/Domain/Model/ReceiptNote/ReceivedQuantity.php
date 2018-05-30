<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\ReceiptNote;

use Webmozart\Assert\Assert;

class ReceivedQuantity
{
    private $quantity;

    public function __construct(int $quantity)
    {
        Assert::greaterThanEq($quantity, 0);

        $this->quantity = $quantity;
    }

    public function toInt(): int
    {
        return $this->quantity;
    }
}
