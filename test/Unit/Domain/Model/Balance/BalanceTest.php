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
use Ramsey\Uuid\Uuid;
use Warehouse\Domain\Model\Product\ProductId;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class BalanceTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_new_balance(): void
    {
        $uuid = Uuid::uuid4()->toString();
        $productId = ProductId::fromString($uuid);
        $balanceLevel = new BalanceLevel();

        $balance = new Balance($productId, $balanceLevel);

        $this->assertSame($uuid, (string) $balance->productId());
        $this->assertSame($balanceLevel, $balance->level());
    }
}
