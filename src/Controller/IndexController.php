<?php

namespace App\Controller;

use App\Entity\Borrowing;
use App\Entity\Employee;
use App\Entity\Material;
use App\Entity\MaterialKind;
use App\Entity\Student;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $numberusers = $this->entityManager->getRepository(User::class)->count([]);
        $numberborrowing = $this->entityManager->getRepository(Borrowing::class)->count([]);
        $numbermaterial = $this->entityManager->getRepository(Material::class)->count([]);
        $numbermaterialking = $this->entityManager->getRepository(MaterialKind::class)->count([]);
        $numberemployee = $this->entityManager->getRepository(Employee::class)->count([]);
        $numberstudent = $this->entityManager->getRepository(Student::class)->count([]);

        return $this->render('index/index.html.twig', [
            'numberusers' => $numberusers,
            'numberborrowing' => $numberborrowing,
            'numbermaterial' => $numbermaterial,
            'numbermaterialking' => $numbermaterialking,
            'numberemployee' => $numberemployee,
            'numberstudent' => $numberstudent,
            'controller_name' => 'IndexController',
        ]);
    }
}
