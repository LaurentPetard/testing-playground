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

namespace Warehouse\Domain\Model\ReceiptNote;

use Warehouse\Domain\Model\Product\ProductId;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class ReceiptNoteLine
{
    private $productId;

    private $receivedQuantity;

    public function __construct(ProductId $productId, ReceivedQuantity $receivedQuantity)
    {
        $this->productId = $productId;
        $this->receivedQuantity = $receivedQuantity;
    }
}
