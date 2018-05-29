<?php
/*
 * This file is part of TestingPlayground.
 *
 * Copyright (c) 2018 Damien Carcel <damien.carcel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Warehouse\Domain\Model\ReceiptNote;

use PHPUnit\Framework\TestCase;
use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderId;

class ReceiptNoteTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_receipt_note()
    {
        $receiptNote = new ReceiptNote(new PurchaseOrderId());

        $this->assertInstanceOf(ReceiptNoteId::class, $receiptNote->id());
    }

    /**
     * @test
     */
    public function it_adds_a_receipt_note_line()
    {
        $receiptNote = new ReceiptNote(new PurchaseOrderId());

        $receiptNote->receiveProduct(new ProductId(), new ReceivedQuantity(42));

        $this->assertCount(1, $receiptNote->lines());
    }

    /**
     * @test
     * @expectedException \LogicException
     */
    public function a_product_can_not_be_received_twice()
    {
        $receiptNote = new ReceiptNote(new PurchaseOrderId());

        $productId = new ProductId();
        $receiptNote->receiveProduct($productId, new ReceivedQuantity(42));
        $receiptNote->receiveProduct($productId, new ReceivedQuantity(3));
    }
}
