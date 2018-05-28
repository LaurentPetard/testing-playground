<?php

declare(strict_types=1);

namespace Warehouse\Domain\Model\PurchaseOrder;

use Webmozart\Assert\Assert;

class LineNumber
{
    private $lineNumber;

    public function __construct(int $lineNumber)
    {
        Assert::greaterThan($lineNumber, 0);

        $this->lineNumber = $lineNumber;
    }
}
