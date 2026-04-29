<?php

namespace App\Controller;

use App\Entity\Dessin;
use App\Form\DessinType;
use App\Repository\DessinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DessinController extends AbstractController
{
    #[Route('/dessin', name: 'app_dessin_list', methods: ['GET'])]
    public function list(DessinRepository $dessinRepository): Response
    {
        $dessins = $dessinRepository->findAll();
        return $this->render('dessin/list.html.twig', [
            'dessins' => $dessins,
        ]);
    }

    #[Route("/valider", name: 'app_dessin_valider')]
    public function valider(DessinRepository $dessinRepository): Response
    {
        $dessins = $dessinRepository->findAll();
        return $this->render('dessin/valider.html.twig', [
            'dessins' => $dessins,
            ]);
    }

    #[Route("/ajouter", name: 'app_dessin_ajouter', methods: ['GET', 'POST'])]
    public function ajouter(Request $request, EntityManagerInterface $entityManager): Response
    {
        //je crée une instance de Dessin vide
        $dessin = new Dessin();
        //je crée le formulaire en l'associant avec l'entité Dessin
        $dessinForm = $this->createForm(DessinType::class, $dessin);
        // traite le formulaire d'ajout de dessin
        $dessinForm->handleRequest($request);
        //est-ce que le formulaire est soumis et valide?
        if ($dessinForm->isSubmitted() && $dessinForm->isValid()) {
            //on sauvegarde en bdd grâce à l'entitymanager que je passe en paramètres dans function ajouter
            $entityManager->persist($dessin);
            $entityManager->flush();
            //crée un message qui va s'afficher une seule fois sur la prochaine page
            $this->addFlash("success", "Votre dessin a bien été ajouté!");
            //redirige vers la page de la galerie de dessins
            return $this->redirectToRoute('app_dessin_list');
        }

        return $this->render('dessin/ajouter.html.twig', [
            // je passe le formulaire à twig pour affichage
            'dessinForm' => $dessinForm,
            //l'autocomplétion me propose: 'dessinForm' => $dessinForm->createView(),
        ]);
    }




}
