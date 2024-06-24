<?php

namespace App\Controller\Product;

use App\Service\Product\ProductServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    public function __construct(
        private ProductServiceInterface $productService
    ) {
    }

    public function index(): JsonResponse
    {
        return $this->json(
            [
                'data' => $this->productService->getList(),
            ]
        );
    }

    public function findById(Request $request): JsonResponse
    {
        $id = $request->attributes->get('id');

        if (empty($id) || !is_int($id)) {
            return new JsonResponse(
                [
                    'error' => 'invalid id param',
                ],
                422
            );
        }

        return new JsonResponse(
            [
                'data' => $this->productService->getById($id),
            ]
        );
    }
}
