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

        $roles = ['ROLE_EMPLOYEE', 'ROLE_DIRECTOR', 'ROLE_MANAGER'];

        for ($i=0; $i < 20; $i++){
            $employee = new Employee();
            $employee->setLastname($faker->lastName);
            $employee->setFirstname($faker->firstName);
            $employee->setUsername($faker->userName);
            $employee->setPassword('password');
            $randomRole = $roles[array_rand($roles)];
            $employee->setRoles([$randomRole]);
            $employee->setIsActive(true);
            $this->addReference('employee_' . $i, $employee);
            $manager->persist($employee);
        }

        $manager->flush();
    }
}
