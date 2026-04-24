<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TechniqueController extends AbstractController
{
    #[Route('/', name: 'technique_home')]
    public function home(): Response
    {
        return $this->render('technique/home.html.twig', [
            'controller_name' => 'TechniqueController',
        ]);
    }
}
