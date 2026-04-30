<?php

namespace App\Controller;

use App\Entity\Technique;
use App\Form\TechniqueType;
use App\Repository\TechniqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class TechniqueController extends AbstractController
{
    #[Route('/', name: 'technique_home')]
    public function home(TechniqueRepository $techniqueRepository): Response
    {
        $techniques = $techniqueRepository->findAll();
        return $this->render('technique/home.html.twig', [
            'techniques' => $techniques,
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route("/creer", name: 'technique_creer', methods: ['GET', 'POST'])]
    public function creer(Request $request, EntityManagerInterface $entityManager): Response
    {   //je crée une instance de Technique vide
        $technique = new Technique();
        //je crée le formulaire en l'associant avec l'entité Technique
        $techniqueForm = $this->createForm(TechniqueType::class, $technique);
        // traite le formulaire de création de technique
        $techniqueForm->handleRequest($request);
        //est-ce que le formulaire est soumis et valide?
        if ($techniqueForm->isSubmitted() && $techniqueForm->isValid()) {
            //on sauvegarde en bdd grâce à l'entitymanager que je passe en paramètres dans function creer
            $entityManager->persist($technique);
            $entityManager->flush();
            //redirige vers la page de la page d'accueil
            return $this->redirectToRoute('technique_home');
        }

        return $this->render('technique/creer.html.twig', [
           // je passe le formulaire à twig pour affichage
            //'technique' => $technique,
            'techniqueForm' => $techniqueForm,
            //'techniqueForm' => $techniqueForm->createView(),
        ]);

    }

    #[Route("/description{id}", name: 'technique_description', methods: ['GET'])]
    public function description(int $id, TechniqueRepository $techniqueRepository): Response
    {
        //va chercher la description de la technique en bdd
        $technique = $techniqueRepository->find($id);
        return $this->render('technique/description.html.twig', [
            'technique' => $technique,
        ]);
    }



}
