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

    /**
     * @Route("/categorie/plats", name="categorie_plats",  methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function plats(CreateRecetteRepository $createRecetteRepository): Response
    {
        return $this->render('categorie/plat.html.twig', [
            'create_recettes' => $createRecetteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/categorie/entrees", name="categorie_entrees",  methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function entree(CreateRecetteRepository $createRecetteRepository): Response
    {
        return $this->render('categorie/entree.html.twig', [
            'create_recettes' => $createRecetteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/categorie/deserts", name="categorie_deserts",  methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function categorie(CreateRecetteRepository $createRecetteRepository): Response
    {
        return $this->render('categorie/desert.html.twig', [
            'create_recettes' => $createRecetteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/categorie/vegetarien", name="categorie_vegetarien",  methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function vegetarien(CreateRecetteRepository $createRecetteRepository): Response
    {
        return $this->render('categorie/vegetarien.html.twig', [
            'create_recettes' => $createRecetteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/categorie/nouveaute", name="categorie_nouveaute",  methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function nouveaute(CreateRecetteRepository $createRecetteRepository): Response
    {
        return $this->render('categorie/nouveaute.html.twig', [
            'create_recettes' => $createRecetteRepository->findAll(),
        ]);
    }
}
