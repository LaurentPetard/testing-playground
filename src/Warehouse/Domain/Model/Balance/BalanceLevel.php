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

use Warehouse\Domain\Model\PurchaseOrder\ReceivedQuantity;
use Webmozart\Assert\Assert;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class BalanceLevel
{
    private $level = 0;

    /**
     * @param int $level
     */
    public function __construct(int $level = 0)
    {
        $this->level = $level;
    }

    public function increase(ReceivedQuantity $receivedQuantity): BalanceLevel
    {
        return new self($this->level += $receivedQuantity->toInt());
    }
}
