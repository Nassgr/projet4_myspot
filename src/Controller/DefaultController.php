<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Annonce;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(AnnonceRepository $annonces): Response
    {
        return $this->render('homepage.html.twig', [
            'controller_name' => 'DefaultController',
            'annonces' => $annonces->findAll()
        ]);
    }

}
