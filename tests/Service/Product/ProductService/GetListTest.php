<?php

declare(strict_types=1);

namespace App\Tests\Service\Product\ProductService;

use App\Entity\Product;

class GetListTest extends ProductServiceTest
{
    public function testGetList(): void
    {
        $products = [new Product()];

        $this->productRepository
            ->expects($this->once())
            ->method('getList')
            ->willReturn($products);

        $actual = $this->productService->getList();

        $this->assertEquals($products, $actual);
    }
}