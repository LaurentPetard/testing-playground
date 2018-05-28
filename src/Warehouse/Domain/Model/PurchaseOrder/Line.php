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

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class Line
{
    private $productId;

    private $lineNumber;

    private $orderedQuantity;

    private $receivedquantity;

    public function __construct(ProductId $productId, OrderedQuantity $orderedQuantity, LineNumber $lineNumber)
    {
        $this->productId = $productId;
        $this->lineNumber = $lineNumber;
        $this->orderedQuantity = $orderedQuantity;
        $this->receivedquantity = new ReceivedQuantity(0);
    }
}
