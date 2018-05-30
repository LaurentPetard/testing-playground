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

use PHPUnit\Framework\TestCase;
use Warehouse\Domain\Model\ReceiptNote\ReceivedQuantity;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class BalanceLevelTest extends TestCase
{
    /**
     * @test
     */
    public function it_increases_the_balance_level()
    {
        $balanceLevel = new BalanceLevel(42);
        $receivedQuantity = new ReceivedQuantity(2);

        $balanceLevel = $balanceLevel->receiveProducts($receivedQuantity);
        $this->assertSame(44, $balanceLevel->toInt());
    }
}
