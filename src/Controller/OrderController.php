<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\OrdersReportService;

class OrderController extends AbstractController
{
    public function __construct(
        private OrdersReportService $orderService
    ) {}

    #[Route('/orders', name: 'app_order')]
    public function index(): Response
    {
        $orders = $this->orderService->create();
 
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
            'orders' => $orders
        ]);
    }
}
