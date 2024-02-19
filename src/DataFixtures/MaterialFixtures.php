<?php

namespace App\DataFixtures;

use App\Entity\Material;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MaterialFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 20; $i++){
            $material = new Material();
            $material->setName($faker->name);
            $material->setSerialNumber($faker->text);
            $material->setTagNumber($faker->text);
            $material->setComment($faker->comment);
            $material->setLocation($faker->text);
            $manager->persist($material);
        }
        $manager->flush();
    }
}
