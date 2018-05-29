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

namespace Warehouse\Domain\Model\Supplier;

use Common\Aggregate;
use Common\AggregateId;
use Ramsey\Uuid\Uuid;

/**
 * @author Damien Carcel <damien.carcel@gmail.com>
 */
class Supplier extends Aggregate
{
    private $id;

    private $name;

    public function __construct()
    {
        $this->id = SupplierId::fromString(Uuid::uuid4()->toString());
    }

    public function id(): SupplierId
    {
        return $this->id;
    }
}
