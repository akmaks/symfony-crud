<?php

declare(strict_types=1);

namespace App\Service\Product;

use App\Entity\Product;
use App\Repository\Product\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    public function __construct(private ProductRepositoryInterface $productRepository)
    {
    }

    /**
     * @return array<Product>
     */
    public function getList(): array
    {
        return $this->productRepository->getList();
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function getById(int $id): ?Product
    {
        return $this->productRepository->getById($id);
    }
}
