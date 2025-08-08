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


    #[Route('/connexion', name: 'connexion')]
    public function connexion(): Response
    {
        return $this->render('connexion.html.twig');
    }

    #[Route('/deconnexion', name: 'deconnexion')]
    public function deconnexion(): Response
    {
        return $this->render('deconnexion.html.twig');
    }


    #[Route('/creationdecompte',name: 'creationdecompte')]
    public function creationdecompte(): Response 
    {
        return $this->render('creationdecompte.html.twig');
    }

    #[Route('/reinitialisermdp',name: 'reinitialisermdp')]
public function reinitialisermdp(): Response
{
    return $this->render('reinitialisermdp.html.twig');
}

    #[Route('/creationtrajet',name: 'creationtrajet')]
    public function creationtrajet(): Response 
    {
        return $this->render('creationtrajet.html.twig');
    }

#[Route('/trajetencour' , name : 'trajetencour')]
public function trajetencour(): Response 
{
    return $this->render('trajetencour.html.twig');
}

#[Route('/moncompte' , name : 'moncompte')]
public function moncompte(): Response 
{
    return $this->render('moncompte.html.twig');
}


}

