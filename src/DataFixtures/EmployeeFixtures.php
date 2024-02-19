<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create('fr_FR');

        for ($i=0; $i < 20; $i++){
            $employee = new Employee();
            $employee->setLastname($faker->lastName);
            $employee->setFirstname($faker->firstName);
            $employee->setUsername($faker->userName);
            $employee->setPassword($faker->password);
            $employee->setRoles($faker->jobTitle);
            $manager->persist($employee);
        }

        $manager->flush();
    }
}
