<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder;

use Common\AggregateRepository;

class PurchaseOrderRepository extends AggregateRepository
{
    /** @var PurchaseOrder[] */
    private $purchaseOrders;

    public function __construct(PurchaseOrder ...$purchaseOrders)
    {
        $this->purchaseOrders = $purchaseOrders;
    }

    public function findById(PurchaseOrderId $purchaseOrderId)
    {
        return $this->purchaseOrders[(string) $purchaseOrderId] ?? null;
    }

    /**
     * @return PurchaseOrder[]
     */
    public function findAll(): array
    {
        return $this->purchaseOrders;
    }

    public function save(PurchaseOrder $purchaseOrder): void
    {
        $this->store($purchaseOrder);
    }
}
