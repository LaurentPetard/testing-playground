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

namespace Warehouse\Domain\ReadModel;

use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderRepository;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class BalanceRepository
{
    /** @var PurchaseOrderRepository */
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    public function getForProduct(ProductId $productId): Balance
    {
        $purchaseOrders = $this->purchaseOrderRepository->findAll();

        $balanceLevel = new BalanceLevel();
        foreach ($purchaseOrders as $purchaseOrder) {
            $balanceLevel->addReceivedQuantity($purchaseOrder->getReceivedQuantityForProduct($productId));
        }
    }
}
