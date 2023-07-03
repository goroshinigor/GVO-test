<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\OrderProductRepository;
use App\Common\Sales\Report;

class OrdersReportService
{
    public function __construct(
        private OrderProductRepository $orderProductRepository
    ) {}

    public function create(): ?array{
        $orders = $this->orderProductRepository->findAll();

        $report = array();
        foreach($orders as $order) {
            @$report[$order->getOrder()->getId()]['name'] = $order
                ->getOrder()->getName();
            @$report[$order->getOrder()->getId()]['amount'] += 
                ($order->getProduct()->getPrice() * $order->getQuantity());
        }

        return $report;
    }
}