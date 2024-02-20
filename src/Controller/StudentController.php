<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/student', name: 'student_')]
class StudentController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(StudentRepository $studentRepository): Response
    {        
        // dd($currentUser);
        // $category = $categoryRepository->find(10);
        // dd($movies);
        return $this->render('student/index.html.twig', [
            'students' => $studentRepository->findAll()
        ]);
    }

    
    #[Route('/create', name: 'create')]
    public function create(Request $request, EntityManagerInterface $em) {
        $student = new Student;
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        // $movie = $entityManager->getRepository(Movie::class)->findOneBy(['id' => $id]);
        
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('student_index');
        }
        // dd($movie->getActors()->toArray());
        # On se rend dans le dossier template en utilisant this, puisqu'on l'a étendu
        return $this->render('student/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Student $student, EntityManagerInterface $em) {
        $em->remove($student);
        $em->flush();
        return $this->redirectToRoute('student_index');
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $em, Student $student) {
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        // $movie = $entityManager->getRepository(Movie::class)->findOneBy(['id' => $id]);
        
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('student_index');
        }
        // dd($movie->getActors()->toArray());
        # On se rend dans le dossier template en utilisant this, puisqu'on l'a étendu
        return $this->render('student/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/{id}', name: 'show')]

    public function show(Student $student) {

        // $movie = $entityManager->getRepository(Movie::class)->findOneBy(['id' => $id]);

        if(is_null($student)) {
            return $this->redirectToRoute('student_index');
        }
        // dd($movie->getActors()->toArray());
        # On se rend dans le dossier template en utilisant this, puisqu'on l'a étendu
        return $this->render('student/show.html.twig', [
            "student" => $student
        ]);
    }
}
