<?php
/*
 * This file is part of TestingPlayground.
 *
 * Copyright (c) 2018 Damien Carcel <damien.carcel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Warehouse\Domain\Model\Product;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ProductIdTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_product_id(): void
    {
        $productId = ProductId::fromString(Uuid::uuid4()->toString());

        $this->assertInstanceOf(ProductId::class, $productId);
    }
}
