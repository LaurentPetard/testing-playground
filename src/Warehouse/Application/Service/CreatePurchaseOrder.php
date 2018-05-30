<?php

declare(strict_types=1);

namespace Warehouse\Application\Service;

use Warehouse\Application\DTO\CreatePurchaseOrderRequest;
use Warehouse\Domain\Model\Product\ProductId;
use Warehouse\Domain\Model\Product\ProductRepository;
use Warehouse\Domain\Model\PurchaseOrder\OrderedQuantity;
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrder;
use Warehouse\Domain\Model\PurchaseOrder\PurchaseOrderRepository;
use Warehouse\Domain\Model\Supplier\SupplierId;

class CreatePurchaseOrder
{
    /** @var PurchaseOrderRepository */
    private $purchaseOrderRepository;

    /** @var ProductRepository */
    private $productRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepository, ProductRepository $productRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
        $this->productRepository = $productRepository;
    }

    public function __invoke(CreatePurchaseOrderRequest $createPurchaseOrderRequest): PurchaseOrder
    {
        $supplierId = SupplierId::fromString($createPurchaseOrderRequest->supplierId());
        $purchaseOrder = new PurchaseOrder($supplierId);

        foreach ($createPurchaseOrderRequest->productQuantities() as $productId => $quantity)
        {
            $product = $this->productRepository->get(ProductId::fromString($productId));
            $quantity = new OrderedQuantity($quantity);

            $purchaseOrder->addProduct($productId, $quantity);
        }

        $this->purchaseOrderRepository->save($purchaseOrder);

        return $purchaseOrder;
    }
}
