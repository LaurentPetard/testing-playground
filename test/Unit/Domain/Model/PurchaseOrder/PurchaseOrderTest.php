<?php
/*
 * This file is part of TestingPlayground.
 *
 * Copyright (c) 2018 Damien Carcel <damien.carcel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Warehouse\Domain\Model\PurchaseOrder;

use PHPUnit\Framework\TestCase;
use Warehouse\Domain\Model\PurchaseOrder\Status\NotReceived;
use Warehouse\Domain\Model\Supplier\Supplier;

class PurchaseOrderTest extends TestCase
{
    /**
     * @test
     */
    public function i_can_create_a_purshase_order(): void
    {
        $supplier = new Supplier();
        $lines = [new Line()];

        $purchaseOrder = new PurchaseOrder($supplier, $lines);

        $this->assertInstanceOf(NotReceived::class, $purchaseOrder->status());
    }
}
