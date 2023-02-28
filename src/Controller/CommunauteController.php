<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommunauteController extends AbstractController
{
    #[Route('/communaute', name: 'app_communaute')]
    public function index(): Response
    {
        return $this->render('communaute/index.html.twig', [
            'controller_name' => 'CommunauteController',
        ]);
    }
}
