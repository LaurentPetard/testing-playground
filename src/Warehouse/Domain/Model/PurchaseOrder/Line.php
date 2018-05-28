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

use Warehouse\Domain\Model\Product\Product;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class Line
{
    private $product;

    private $lineNumber;

    private $orderedQuantity;

    private $receivedquantity;

    public function __construct(Product $product, OrderedQuantity $orderedQuantity, LineNumber $lineNumber)
    {
        $this->product = $product;
        $this->lineNumber = $lineNumber;
        $this->orderedQuantity = $orderedQuantity;
        $this->receivedquantity = new ReceivedQuantity(0);
    }
}
