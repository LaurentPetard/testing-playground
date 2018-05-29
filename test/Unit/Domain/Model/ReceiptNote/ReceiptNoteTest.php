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
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderId;

class ReceiptNoteTest extends TestCase
{
    public function it_creates_a_receipt_note()
    {
        $purchaseOrderId = new PurchaseOrderId();

        $receiptNote = new ReceiptNote($purchaseOrderId);
    }
}
