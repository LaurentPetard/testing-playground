<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\ReceiptNote;

use Common\Aggregate;
use Common\AggregateId;
use Ramsey\Uuid\Uuid;
use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderId;
use Warehouse\Domain\Model\ReceiptNote\Event\ProductReceived;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class ReceiptNote extends Aggregate
{
    private $id;

    private $lines;

    private $purchaseOrderId;

    public function __construct(PurchaseOrderId $purchaseOrderId)
    {
        $this->purchaseOrderId = $purchaseOrderId;
        $this->id = ReceiptNoteId::fromString(Uuid::uuid4()->toString());
        $this->lines = [];
    }

    public function receiveProduct(ProductId $productId, ReceivedQuantity $receivedQuantity): void
    {
        if ($this->linesContainProduct($productId)) {
            throw new \LogicException();
        }

        $line = new ReceiptNoteLine($productId, $receivedQuantity);
        $this->lines[(string) $productId] = $line;

        $this->recordThat(new ProductReceived($line));
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
