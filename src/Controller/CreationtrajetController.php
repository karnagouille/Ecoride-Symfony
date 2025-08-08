<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CreationtrajetType;
use App\Entity\Covoit;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Attribute\IsGranted;


final class CreationtrajetController extends AbstractController
{
    #[Route('/creationtrajet', name: 'creationtrajet')]
    #[IsGranted("ROLE_USER")]
    public function index(Request $request,EntityManagerInterface $em): Response
    {

    $covoit = new Covoit();
    $user = $this->getUser();

if(!($user instanceof User)) {
    throw new \Exception('User is not instanceof ' . User::class);
} 
    $userCars = $user->getCars(); 
    $form = $this->createForm(CreationtrajetType::class, $covoit,[
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