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

    public function __construct(Supplier $supplier, iterable $lines)
    {
        $this->id = (new UuidFactory)->uuid4();
        $this->supplier = $supplier;
        $this->status = new NotReceived();

        foreach ($lines as $line) {
            $this->addLine($line);
        }
    }

    public function status(): Status
    {
        return $this->status;
    }

    private function addLine(Line $line): void
    {
        $this->lines[] = $line;
    }
}
