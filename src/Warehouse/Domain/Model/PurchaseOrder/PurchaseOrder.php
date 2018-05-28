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

use Ramsey\Uuid\UuidFactory;
use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\Status\NotReceived;
use Warehouse\Domain\Model\PurchaseOrder\Status\Status;
use Warehouse\Domain\Model\Supplier\Supplier;
use Warehouse\Domain\Model\Supplier\SupplierId;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class PurchaseOrder
{
    private $id;

    private $lines;

    private $supplierId;

    private $status;

    private function __construct(SupplierId $supplierId)
    {
        $this->id = (new UuidFactory)->uuid4();
        $this->supplierId = $supplierId;
        $this->status = new NotReceived();
        $this->lines = [];
    }

    public static function fromSupplier(Supplier $supplier)
    {
        return new self($supplier->id());
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function addLine(ProductId $productId, OrderedQuantity $quantity): void
    {
        $lineNumber = new LineNumber(count($this->lines) + 1);
        $this->lines[] = new Line($productId, $quantity, $lineNumber);
    }

    public function lines(): array
    {
        return $this->lines;
    }
}
