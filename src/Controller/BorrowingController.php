<?php

namespace App\Controller;

use App\Entity\Borrowing;
use App\Form\BorrowingType;
use App\Repository\BorrowingRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BorrowingController extends AbstractController
{
    #[Route('/borrowings', name: 'app_borrowing')]
    public function index(BorrowingRepository $borrowingRepository): Response
    {
        return $this->render('borrowing/index.html.twig', [
            'borrowings' => $borrowingRepository->findAll(),
        ]);
    }

    #[Route('/borrowings/create', name: 'borrowing_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $borrowing = new Borrowing();
        $form = $this->createForm(BorrowingType::class, $borrowing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($borrowing);
            $em->flush();
            return $this->redirectToRoute('app_borrowing');
        }

        return $this->render('borrowing/create.html.twig', [
            'borrowing_create' => $form->createView()
        ]);
    }

    #[Route('/borrowings/edit/{id}', name: 'borrowing_edit')]
    public function edit(Borrowing $borrowing, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(BorrowingType::class, $borrowing, ['edit_mode' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($borrowing);
            $em->flush();
            return $this->redirectToRoute('app_borrowing');
        }

        return $this->render('borrowing/edit.html.twig', [
            'borrowing_edit' => $form->createView()
        ]);
    }

}