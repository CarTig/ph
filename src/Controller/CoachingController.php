<?php

namespace App\Controller;


use App\Repository\CoachingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoachingController extends AbstractController
{
    #[Route('/coaching', name: 'app_coaching')]
    public function index(CoachingRepository $repository): Response
    {
        return $this->render('coaching/index.html.twig', [
            "coachings" => $repository->findAll(),
            
        ]);
    }
}
