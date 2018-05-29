<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder\Event;

use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrder;

class PurchaseOrderCreated
{
    private $purchaseOrder;

    public function __construct(PurchaseOrder $purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;
    }
}
