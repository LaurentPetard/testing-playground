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
use Warehouse\Domain\Model\Product\Product;
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

        $purchaseOrder = new PurchaseOrder($supplier->id());

        $this->assertInstanceOf(NotReceived::class, $purchaseOrder->status());
        $this->assertCount(0, $purchaseOrder->lines());
    }

    /**
     * @test
     */
    public function it_adds_a_line(): void
    {
        $supplier = new Supplier();
        $product = new Product();

        $purchaseOrder = new PurchaseOrder($supplier->id());
        $purchaseOrder->addProduct($product->id(), new OrderedQuantity(42));

        $this->assertCount(1, $purchaseOrder->lines());
    }
}
