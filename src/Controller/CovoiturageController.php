<?php

namespace App\Controller;

use App\Form\CovoitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CovoiturageController extends AbstractController
{
    #[Route('/covoiturage', name: 'covoiturage')]
    public function index(Request $request): Response
    {
        // Création du formulaire 
        
        $form = $this->createForm(CovoitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        return $this->redirectToRoute('covoiturage');
        }

        return $this->render('covoiturage.html.twig', [
            'form' => $form->createView(),
            'trajets' => [],
            'controller_name' => 'CovoiturageController',
        ]);
    }
}
