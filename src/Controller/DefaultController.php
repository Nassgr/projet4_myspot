<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Annonce;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(AnnonceRepository $annoncesAr, Request $request): Response
    {
        $form = $this->createForm('App\Form\SearchType');

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $annonces = $annoncesAr->findByLike($data['title']);

            return $this->render('homepage.html.twig', [
                'controller_name' => 'DefaultController',
                'annonces' => $annonces,
                'form' => $form->createView()
            ]);
        }
        return $this->render('homepage.html.twig', [
            'controller_name' => 'DefaultController',
            'annonces' => $annoncesAr->findAll(),
            'form' => $form->createView()
        ]);
    }

}
