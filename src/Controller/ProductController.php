<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(): JsonResponse
    {
        return $this->json(
            [
                'data' => $this->productRepository->findAll(),
            ]
        );
    }

    public function findById(Request $request): JsonResponse
    {
        $id = $request->attributes->get('id');

        return $this->json(
            [
                'data' => $this->productRepository->find($id),
            ]
        );
    }
}
