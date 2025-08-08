<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CreationdecompteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CreationdecompteController extends AbstractController
{
    #[Route('/creationdecompte', name: 'creationdecompte')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {

        // 1. Création d'un nouvel utilisateur vide
        $user = new User();

        // 2. Création du formulaire lié à cet utilisateur
        $form = $this->createForm(CreationdecompteType::class, $user);

        // 3. Traitement de la requête
        $form->handleRequest($request);

        dump($request->getMethod());
dump($request->request->all());

        if ($form->isSubmitted()) {
    dd($form->isValid(), $form->getErrors(true));
}

        // 4. Si formulaire soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            // 5. Récupération du mot de passe en clair (champ non mappé)
            $plainPassword = $form->get('plainPassword')->getData();

            // 6. Hashage du mot de passe
            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            dump($plainPassword);
            $user->setPassword($hashedPassword);

            // 7. Persister et flush en base
            $entityManager->persist($user);
            $entityManager->flush();

            // 8. Rediriger ou afficher message
            return $this->redirectToRoute('moncompte');
            
        }

        // 9. Affichage du formulaire
        return $this->render('creationdecompte.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
