<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    public function index(ProductRepository $productRepository): JsonResponse
    {
        return $this->json([
            'data' => $productRepository->findAll(),
        ]);
    }
}
