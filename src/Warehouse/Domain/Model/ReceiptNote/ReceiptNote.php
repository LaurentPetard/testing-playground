<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\ReceiptNote;

use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderId;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class ReceiptNote
{
    private $id;

    private $lines;

    private $purchaseOrderId;

    public function __construct(PurchaseOrderId $purchaseOrderId)
    {
        $this->purchaseOrderId = $purchaseOrderId;
        $this->id = new ReceiptNoteId();
        $this->lines = [];
    }

    public function receiveProduct(ProductId $productId, ReceivedQuantity $receivedQuantity): void
    {
        if ($this->linesContainProduct($productId)) {
            throw new \LogicException();
        }

        $this->lines[(string) $productId] = new ReceiptNoteLine($productId, $receivedQuantity);
    }

    public function id(): ReceiptNoteId
    {
        return $this->id;
    }

    public function lines(): array
    {
        return $this->lines;
    }

    private function linesContainProduct(ProductId $productId): bool
    {
        return isset($this->lines[(string) $productId]);
    }
}
