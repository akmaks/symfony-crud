<?php

declare(strict_types=1);

namespace App\Service\Product;

use App\Entity\Product;

interface ProductServiceInterface
{
    /**
     * @return array<Product>
     */
    public function getList(): array;

    public function getById(int $id): ?Product;
}
