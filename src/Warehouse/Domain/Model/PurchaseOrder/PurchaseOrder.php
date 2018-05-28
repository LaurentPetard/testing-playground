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
use Warehouse\Domain\Model\Product\Product;
use Warehouse\Domain\Model\PurchaseOrder\Status\NotReceived;
use Warehouse\Domain\Model\PurchaseOrder\Status\Status;
use Warehouse\Domain\Model\Supplier\Supplier;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class PurchaseOrder
{
    private $id;

    private $lines;

    private $supplier;

    private $status;

    public function __construct(Supplier $supplier)
    {
        $this->id = (new UuidFactory)->uuid4();
        $this->supplier = $supplier;
        $this->status = new NotReceived();
        $this->lines = [];
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function addLine(Product $product, OrderedQuantity $quantity): void
    {
        $lineNumber = new LineNumber(count($this->lines) + 1);
        $this->lines[] = new Line($product, $quantity, $lineNumber);
    }

    public function lines(): array
    {
        return $this->lines;
    }
}
