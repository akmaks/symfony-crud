<?php

namespace App\Tests\Service\Product\ProductService;

use App\Repository\Product\ProductRepositoryInterface;
use App\Service\Product\ProductService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class ProductServiceTest extends TestCase
{
    protected MockObject|ProductRepositoryInterface $productRepository;

    protected ProductService $productService;

    /**
     * Set up test
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->productRepository = $this
            ->getMockBuilder(ProductRepositoryInterface::class)
            ->getMock();

        $this->productService = new ProductService($this->productRepository);
    }
}
