<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Product\ProductService;

use App\Entity\Product;

class GetByIdTest extends ProductServiceTest
{
    /**
     * @dataProvider dataProvider
     */
    public function testGetById(int $id, mixed $product): void
    {
        $this->productRepository
            ->expects($this->once())
            ->method('getById')
            ->with($id)
            ->willReturn($product);

        $actual = $this->productService->getById($id);

        $this->assertEquals($product, $actual);
    }

    /**
     * @return array<array<string,mixed>>
     */
    public function dataProvider(): array
    {
        return [
            [
                'id' => 1,
                'product' => new Product(),
            ],
            [
                'id' => 2,
                'product' => null,
            ]
        ];
    }
}
