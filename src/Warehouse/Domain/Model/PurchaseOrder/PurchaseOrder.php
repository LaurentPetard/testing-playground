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
use Common\AggregateId;
use Ramsey\Uuid\Uuid;
use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\Status\NotReceived;
use Warehouse\Domain\Model\PurchaseOrder\Status\Status;
use Warehouse\Domain\Model\Supplier\SupplierId;

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
        $this->lines[] = new Line($productId, $quantity, $lineNumber);
    }

    public function lines(): array
    {
        return $this->lines;
    }
}
