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

namespace Warehouse\Domain\Model\Balance;

use Warehouse\Domain\Model\Product\ProductId;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class BalanceRepository
{
    /** @var Balance[] */
    private $balances = [];

    public function getForProduct(ProductId $productId): Balance
    {
        return $this->balances[(string) $productId] ?? new Balance($productId, new BalanceLevel());
    }

    public function save(Balance $balance): void
    {
        $this->balances[(string) $balance->productId()] = $balance;
    }
}
