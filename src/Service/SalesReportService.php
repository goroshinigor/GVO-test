<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\OrderProductRepository;
use App\Common\Sales\Report;

class SalesReportService
{
    public function __construct(
        private OrderProductRepository $orderProductRepository
    ) {}

    public function create(Product $product): ?Report{
        $productSales = $this->orderProductRepository->findBy([
            'product' => $product->getId()
        ]);

        $totalSum = 0;
        $totalQuantity = 0;

        foreach($productSales as $sale){
            $totalSum += $sale->getProduct()->getPrice() * $sale->getQuantity();
            $totalQuantity += $sale->getQuantity();
        }

        return new Report(
            $totalSum,
            $totalQuantity
        );
    }
}