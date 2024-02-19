<?php

namespace App\DataFixtures;

use App\Entity\Material;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MaterialFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 20; $i++){
            $material = new Material();
            $material->setName($faker->name);
            $material->setSerialNumber($faker->sentence);
            $material->setTagNumber($faker->sentence);
            $material->setComment($faker->text);
            $material->setLocation($faker->sentence);
            $manager->persist($material);
        }
        $manager->flush();
    }
}
