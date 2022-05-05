<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PfeType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PfeController extends AbstractController
{
    #[Route('/pfe/add', name: 'app_pfe_add')]
    public function index(Request $request , EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PfeType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $pfe = new PFE();
            $pfe = $form->getData();
            $entityManager->persist($pfe);
            $entityManager->flush();
        }
        return $this->render('pfe/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
