<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/annonce")
 */
class AnnonceController extends Controller
{
    /**
     * @Route("/", name="annonce_view", methods="GET")
     */
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('annonce/public/annonce.html.twig', ['annonces' => $annonceRepository->findAll()]);
    }


}
