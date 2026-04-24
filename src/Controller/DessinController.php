<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DessinController extends AbstractController
{
    #[Route('/dessin', name: 'app_dessin')]
    public function index(): Response
    {
        return $this->render('dessin/index.html.twig', [
            'controller_name' => 'DessinController',
        ]);
    }
}
