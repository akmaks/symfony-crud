<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Entity\Product;

interface ProductRepositoryInterface
{
    /**
     * @return array<Product>
     */
    public function getList(): array;

    public function getById(int $id): ?Product;
}
