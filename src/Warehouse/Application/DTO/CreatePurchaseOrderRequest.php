<?php

declare(strict_types=1);

namespace Warehouse\Application\DTO;

class CreatePurchaseOrderRequest
{
    /** @var string */
    private $supplierId;

    /** @var array */
    private $productQuantities;

    public function __construct(string $supplierId, array $productQuantities)
    {
        $this->supplierId = $supplierId;
        $this->productQuantities = $productQuantities;
    }

    /**
     * @return array
     */
    public function productQuantities(): array
    {
        return $this->productQuantities;
    }

    /**
     * @return string
     */
    public function supplierId(): string
    {
        return $this->supplierId;
    }
}
