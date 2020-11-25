<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use App\Repository\CreateRecetteRepository;

/**
 * Class IndexController
 * @package App\Controller
 *
 * @Route("/")
 */

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index",  methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CreateRecetteRepository $createRecetteRepository): Response
    {
        return $this->render('index.html.twig', [
            'create_recettes' => $createRecetteRepository->findAll(),
        ]);
    }
}

