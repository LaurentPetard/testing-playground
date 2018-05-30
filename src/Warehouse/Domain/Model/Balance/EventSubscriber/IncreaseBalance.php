<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\Balance\EventSubscriber;

use Warehouse\Domain\Model\PurchaseOrder\Event\ProductReceived;
use Warehouse\Domain\Model\Balance;

class IncreaseBalance
{
    public function __invoke(ProductReceived $productReceived)
    {
        $balance = new Balance($productReceived);
    }
}
