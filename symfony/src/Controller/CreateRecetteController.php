<?php

namespace App\Controller;

use App\Entity\CreateRecette;
use App\Form\CreateRecetteType;
use App\Repository\CreateRecetteRepository;
use App\Entity\Rating;
use App\Form\RatingType;
use App\Repository\RatingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateRecetteController extends AbstractController
{
    /**
     * @Route("/recette", name="create_recette_index",  methods={"GET"})
     */
    public function index(CreateRecetteRepository $createRecetteRepository): Response
    {
        return $this->render('create_recette/index.html.twig', [
            'create_recettes' => $createRecetteRepository->findAll(),
        ]);
    }


    /**
     * @Route("/recette/new", name="create_recette_new", methods={"GET","POST"})
     */

    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $create_recette = new CreateRecette();
        $form = $this->createForm(CreateRecetteType::class, $create_recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $photoFile */
            $photoFile = $form->get('photo')->getData();
            if ($photoFile) {
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();
                try {
                    $photoFile->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }

                $create_recette->setPhotoFilename($newFilename);
            }


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($create_recette);
            $entityManager->flush();

            return $this->redirectToRoute('create_recette_index');
        }

        return $this->render('create_recette/new.html.twig', [
            'create_recette' => $create_recette,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/recette/{id}", name="create_recette_show", methods={"GET", "POST"})
     */
    public function show(Request $request,CreateRecette $create_recette): Response
    {
        $rating = new Rating();
        $formRating = $this->createForm(RatingType::class, $rating);
        $formRating->handleRequest($request);

        if ($formRating->isSubmitted() && $formRating->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rating);
            $entityManager->flush();

            return $this->redirectToRoute('create_recette_index');
        }



        return $this->render('create_recette/show.html.twig', [
            'create_recette' => $create_recette,
            'rating' => $rating,
            'form' => $formRating->createView(),
        ]);
    }

    /**
     * @Route("/recette/{id}/edit", name="create_recette_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CreateRecette $create_recette): Response
    {
        $form = $this->createForm(CreateRecetteType::class, $create_recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('create_recette_index');
        }

        return $this->render('create_recette/edit.html.twig', [
            'create_recette' => $create_recette,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/recette/{id}", name="create_recette_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CreateRecette $create_recette): Response
    {
        if ($this->isCsrfTokenValid('delete' . $create_recette->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($create_recette);
            $entityManager->flush();
        }

        return $this->redirectToRoute('create_recette_index');
    }
}
