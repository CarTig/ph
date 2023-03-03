<?php

namespace App\Controller;

use App\Repository\CoachingRepository;
use App\Repository\ProgrammeRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProgrammeRepository $programmeRepository, CoachingRepository $repository): Response
    {
        return $this->render('home/index.html.twig', [
            "programmes" => $programmeRepository->findAll(),
            "coachings" => $repository->findAll(),
        ]);
    }
}
