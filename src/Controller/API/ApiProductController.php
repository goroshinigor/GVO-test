<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Service\SalesReportService;

class ApiProductController extends AbstractController
{
    public function __construct(
        private ProductRepository $productRepository,
        private SalesReportService $salesServiceReport
    ) {}

    #[Route('/api/product', name: 'api_product')]
    public function index(): JsonResponse
    {
        return new JsonResponse($this->productRepository->getAllProducts());
    }

    #[Route('/api/product/sales-report/{id}', name: 'api_product_sales_report')]
    public function salesReport(int $id): JsonResponse
    {
        $product = $this->productRepository->find($id);
        $result = $this->salesServiceReport->create($product);

        return new JsonResponse($result->asArray());
    }
}
