<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder;

use Common\AggregateRepository;

class PurchaseOrderRepository extends AggregateRepository
{
    /** @var array */
    private $purchaseOrders;

    public function __construct(PurchaseOrder ...$purchaseOrders)
    {
        $this->purchaseOrders = $purchaseOrders;
    }

    public function findById(PurchaseOrderId $purchaseOrderId)
    {
        return $this->purchaseOrders[(string) $purchaseOrderId] ?? null;
    }

    public function save(PurchaseOrder $purchaseOrder): void
    {
        $this->store($purchaseOrder);
    }
}
