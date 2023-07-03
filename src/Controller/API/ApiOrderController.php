<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\OrderRepository;

class ApiOrderController extends AbstractController
{
    public function __construct(
        private OrderRepository $orderRepository,
    ) {}

    #[Route('/api/order', name: 'api_order')]
    public function index()
    {
        return new JsonResponse($this->orderRepository->findAll());
    }
}
