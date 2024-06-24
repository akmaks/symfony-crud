<?php

namespace App\Tests\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $product = new Product();
            $product->setName($faker->name);
            $product->setPrice($faker->randomFloat());
            $manager->persist($product);
        }

        $manager->flush();
    }
}
