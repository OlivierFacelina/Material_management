<?php

namespace App\Controller;

use App\Entity\Material;
use App\Form\MaterialType;
use App\Repository\MaterialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MaterialController extends AbstractController
{
    #[Route('/material', name: 'app_material')]
    public function index(MaterialRepository $materialRepository): Response
    {
        return $this->render('material/index.html.twig', [
            'materials' => $materialRepository->findAll(),
        ]);

    }
    #[Route('/material/create', name: 'material_create')]

    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $material = new Material;
        $form = $this->createForm(MaterialType::class, $material);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $em->persist($material);
            $em->flush();
            return $this->redirectToRoute('app_material');
        }

        return $this->render('material/create.html.twig', [
            'material' => $form->createView()
        ]);
    }
}
