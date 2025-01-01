<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Product1
        $product = new Product;
        $product->setName('Product One');
        $product->setDescription('This is the first product.');
        $product->setSize(100);
        $manager->persist($product);

        // Product2
        $product2 = new Product;
        $product2->setName('Product Two');
        $product2->setDescription('This is the second product.');
        $product2->setSize(200);
        $manager->persist($product2);

        $manager->flush();
    }
}
