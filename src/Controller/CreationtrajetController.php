<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CreationtrajetType;
use App\Entity\Covoit;
use Doctrine\ORM\EntityManagerInterface;


final class CreationtrajetController extends AbstractController
{
    #[Route('/creationtrajet', name: 'creationtrajet')]
    public function index(Request $request): Response
    {
    $covoit = new Covoit();
    $userCars = $this->getUser()->getCars();

    $form = $this->createForm(creationType::class, $covoit,[
            'user_cars' => $userCars,
        ]);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($covoit);
            $em->flush();

        return $this->redirectToRoute('moncompte');
        }

        return $this->render('creationtrajet.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}