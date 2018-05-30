<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder\Event;

use Warehouse\Domain\Model\PurchaseOrder\Line;

class ProductReceived
{
    /** @var Line */
    private $purchaseOrderLine;

    public function __construct(Line $purchaseOrderLine)
    {
        $this->purchaseOrderLine = $purchaseOrderLine;
    }

    public function getPurchaseOrderLine(): Line
    {
        return $this->purchaseOrderLine;
    }
}
