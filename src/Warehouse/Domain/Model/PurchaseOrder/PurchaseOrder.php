<?php

declare(strict_types=1);

/*
 * This file is part of TestingPlayground.
 *
 * Copyright (c) 2018 Damien Carcel <damien.carcel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Warehouse\Domain\Model\PurchaseOrder;

use Common\Aggregate;
use Ramsey\Uuid\Uuid;
use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\Event\PurchaseOrderCreated;
use Warehouse\Domain\Model\PurchaseOrder\Event\PurshaseOrderLineAdded;
use Warehouse\Domain\Model\PurchaseOrder\Status\NotReceived;
use Warehouse\Domain\Model\PurchaseOrder\Status\Status;
use Warehouse\Domain\Model\Supplier\SupplierId;
use Warehouse\Domain\Model\ReceiptNote;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class PurchaseOrder extends Aggregate
{
    private $id;

    private $lines;

    private $supplierId;

    private $status;

    public function __construct(SupplierId $supplierId)
    {
        $this->id = PurchaseOrderId::fromString(Uuid::uuid4()->toString());
        $this->supplierId = $supplierId;
        $this->status = new NotReceived();
        $this->lines = [];

        $this->recordThat(new PurchaseOrderCreated($this));
    }

    public function id(): PurchaseOrderId
    {
        return $this->id;
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function addProduct(ProductId $productId, OrderedQuantity $quantity): void
    {
        $lineNumber = new LineNumber(count($this->lines) + 1);
        $line = new Line($productId, $quantity, $lineNumber);;
        $this->lines[] = $line;

        $this->recordThat(new PurshaseOrderLineAdded($line));
    }

    public function receiveProduct(ProductId $productId, ReceiptNote\ReceivedQuantity $receivedQuantity)
    {
        $line = $this->getLineForProduct($productId);

        $line->receive($receivedQuantity);
    }

    public function lines(): array
    {
        return $this->lines;
    }

    public function getReceivedQuantityForProduct(ProductId $productId): ReceivedQuantity
    {
        try {
            $line = $this->getLineForProduct($productId);
        } catch (\Exception $e) {

        }
    }

    private function getLineForProduct(ProductId $productId): Line
    {
        foreach ($this->lines as $line)
        {
            if ($line->getProductId->equals($productId)) {
                return $line;
            }
        }

        throw new \Exception('line not found');
    }
}
