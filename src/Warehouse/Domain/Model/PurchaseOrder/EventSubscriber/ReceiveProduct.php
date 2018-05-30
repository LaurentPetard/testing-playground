<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder\EventSubscriber;

use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderRepository;
use Warehouse\Domain\Model\ReceiptNote\Event\ProductReceived;

class ReceiveProduct
{
    /** @var PurchaseOrderRepository */
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    public function __invoke(ProductReceived $receiptNoteLineAdded)
    {
        $purchaseOrder = $this->purchaseOrderRepository->findById($receiptNoteLineAdded->getPurchaseOrderId());
        $purchaseOrder->receiveProduct(
            $receiptNoteLineAdded->getProductId(),
            $receiptNoteLineAdded->getReceivedQuantity()
        );

        $this->purchaseOrderRepository->save($purchaseOrder);
    }
}
