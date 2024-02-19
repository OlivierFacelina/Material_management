<?php

namespace App\DataFixtures;

use App\Entity\Borrowing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BorrowingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create();

        for ($i=0; $i<20; $i++){
            $borrowing = new Borrowing();
            $borrowing->setBorrowDate($faker->dateTimeBetween);
        }
        $manager->flush();
    }
}
