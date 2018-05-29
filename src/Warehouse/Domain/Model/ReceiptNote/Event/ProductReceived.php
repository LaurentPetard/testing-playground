<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\ReceiptNote\Event;

use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderId;
use Warehouse\Domain\Model\ReceiptNote\ReceivedQuantity;

class ProductReceived
{
    /** @var ProductId */
    private $productId;

    /** @var ReceivedQuantity */
    private $receivedQuantity;

    /** @var PurchaseOrderId */
    private $purchaseOrderId;


    public function __construct(PurchaseOrderId $purchaseOrderId, ProductId $productId, ReceivedQuantity $receivedQuantity)
    {
        $this->productId = $productId;
        $this->receivedQuantity = $receivedQuantity;
        $this->purchaseOrderId = $purchaseOrderId;
    }

    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    public function getReceivedQuantity(): ReceivedQuantity
    {
        return $this->receivedQuantity;
    }

    /**
     * @return PurchaseOrderId
     */
    public function getPurchaseOrderId(): PurchaseOrderId
    {
        return $this->purchaseOrderId;
    }
}
