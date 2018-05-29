<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder;

use Webmozart\Assert\Assert;
use Warehouse\Domain\Model\ReceiptNote;

class ReceivedQuantity
{
    private $quantity;

    public function __construct(int $quantity)
    {
        Assert::greaterThanEq($quantity, 0);

        $this->quantity = $quantity;
    }

    public function add(ReceiptNote\ReceivedQuantity $receivedQuantity): ReceivedQuantity
    {
        $totalReceived = $this->quantity + $receivedQuantity->toInt();

        return new self($totalReceived);
    }
}
