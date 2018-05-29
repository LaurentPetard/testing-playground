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

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class Balance
{
    /** @var ProductId */
    private $productId;

    /** @var BalanceLevel */
    private $level;

    /**
     * @param ProductId    $productId
     * @param BalanceLevel $level
     */
    public function __construct(ProductId $productId, BalanceLevel $level)
    {
        $this->productId = $productId;
        $this->level = $level;
    }

    /**
     * @return ProductId
     */
    public function productId(): ProductId
    {
        return $this->productId;
    }

    /**
     * @return BalanceLevel
     */
    public function level(): BalanceLevel
    {
        return $this->level;
    }
}
