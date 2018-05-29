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

namespace Warehouse\Domain\Model\Product;

use Common\Aggregate;
use Common\AggregateId;
use Ramsey\Uuid\Uuid;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class Product extends Aggregate
{
    private $id;

    private $name;

    public function __construct()
    {
        $this->id = ProductId::fromString(Uuid::uuid4()->toString());
    }

    public function id(): ProductId
    {
        return $this->id;
    }
}
