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

use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\ReceiptNote;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class Line
{
    private $productId;

    private $lineNumber;

    private $orderedQuantity;

    private $receivedQuantity;

    public function __construct(ProductId $productId, OrderedQuantity $orderedQuantity, LineNumber $lineNumber)
    {
        $this->productId = $productId;
        $this->lineNumber = $lineNumber;
        $this->orderedQuantity = $orderedQuantity;
        $this->receivedQuantity = new ReceivedQuantity(0);
    }

    /**
     * @return ProductId
     */
    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    public function receive(ReceiptNote\ReceivedQuantity $quantity): void
    {
        $this->receivedQuantity = $this->receivedQuantity->add($quantity);
    }
}
