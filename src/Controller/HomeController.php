<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CovoitType;

class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function home(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/covoit', name: 'covoiturage')]
    public function covoit(Request $request): Response
    {
        $form = $this->createForm(CovoitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        
        }

        return $this->render('covoiturage.html.twig', [
            'form' => $form->createView(),
            'trajets' => [],
        ]);
    }

    #[Route('/connexion', name: 'connexion')]
    public function connexion(): Response
    {
        return $this->render('connexion.html.twig');
    }

    #[Route('/moncompte', name: 'moncompte')]
    public function moncompte(): Response
    {
        return $this->render('moncompte.html.twig');
    }
}
