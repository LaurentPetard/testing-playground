<?php

declare(strict_types=1);

namespace Warehouse\Application\EventSubscriber;

use Warehouse\Domain\Model\Balance;
use Warehouse\Domain\Model\ReceiptNote\Event\ProductReceived;

class UpdateBalance
{
    private $balanceRepository;

    public function __construct(Balance\BalanceRepository $balanceRepository)
    {
        $this->balanceRepository = $balanceRepository;
    }

    public function __invoke(ProductReceived $productReceived)
    {
        $productId = $productReceived->getProductId();
        $receivedQuantity = $productReceived->getReceivedQuantity();

        $balance = $this->balanceRepository->getForProduct($productId);
        $balance->level()->receiveProducts($receivedQuantity);

        $this->balanceRepository->save($balance);
    }
}
