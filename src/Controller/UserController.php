<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Student;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user', name: 'user_')]
class UserController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EmployeeRepository $employeeRepository): Response
    {        

        // dd($currentUser);
        // $category = $categoryRepository->find(10);
        // dd($movies);
        return $this->render('user/index.html.twig', [
            'users' => $employeeRepository->findAll()
        ]);
    }

    
    #[Route('/create', name: 'create')]
    public function create(Request $request, EntityManagerInterface $em) {
        $employee = new Employee;
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);
        // $movie = $entityManager->getRepository(Movie::class)->findOneBy(['id' => $id]);
        
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($employee);
            $em->flush();
            return $this->redirectToRoute('user_index');
        }
        // dd($movie->getActors()->toArray());
        # On se rend dans le dossier template en utilisant this, puisqu'on l'a étendu
        return $this->render('user/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Employee $employee, EntityManagerInterface $em) {
        $em->remove($employee);
        $em->flush();
        return $this->redirectToRoute('user_index');
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $em, Employee $employee) {
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);
        // $movie = $entityManager->getRepository(Movie::class)->findOneBy(['id' => $id]);
        
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($employee);
            $em->flush();
            return $this->redirectToRoute('user_index');
        }
        // dd($movie->getActors()->toArray());
        # On se rend dans le dossier template en utilisant this, puisqu'on l'a étendu
        return $this->render('user/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/{id}', name: 'show')]

    public function show(Employee $employee) {

        // $movie = $entityManager->getRepository(Movie::class)->findOneBy(['id' => $id]);

        if(is_null($employee)) {
            return $this->redirectToRoute('user_index');
        }
        // dd($movie->getActors()->toArray());
        # On se rend dans le dossier template en utilisant this, puisqu'on l'a étendu
        return $this->render('user/show.html.twig', [
            "employee" => $employee
        ]);
    }
}
