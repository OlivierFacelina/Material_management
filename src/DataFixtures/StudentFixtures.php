<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create();

        for ($i=0; $i<20; $i++){
            $student = new Student();
            $student->setFirstname($faker->firstName);
            $student->setLastname($faker->lastName);
            $student->setBirthdate($faker->dateTimeThisCentury);
            $this->addReference('student_' . $i, $student);
            $manager->persist($student);
        }

        $manager->flush();
    }
}
