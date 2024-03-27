<?php

namespace App\DataFixtures;

use App\Entity\Borrowing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BorrowingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i<20; $i++){
            $borrowing = new Borrowing();
            $borrowing->setBorrowDate($faker->dateTimeBetween);
            $borrowing->setExpectedReturnDate($faker->dateTimeBetween);
            $borrowing->setActualReturnDate($faker->dateTimeBetween);
            $borrowing->setComment($faker->sentence);
            $borrowing->setMaterialId($this->getReference('material_' . $faker->numberBetween(0,19)));
            $borrowing->setEmployee($this->getReference('employee_' . $faker->numberBetween(0,19)));
            $borrowing->setStudent($this->getReference('student_' . $faker->numberBetween(0,19)));
            // $borrowing->setTrainingProgram($this->getReference('training_' . $faker->numberBetween(0,19)));
            $manager->persist($borrowing);
        }
        $manager->flush();
    }

    public function getDependencies() {
        return [
            // TrainingProgramFixtures::class,
            StudentFixtures::class,
            EmployeeFixtures::class,
            MaterialFixtures::class
        ];
    }
}
