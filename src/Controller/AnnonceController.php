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
    public function index(AnnonceRepository $annonces): Response
    {
        return $this->render('annonce/public/annonce.html.twig', ['annonces' => $annonces->findAll()]);
    }

    /**
     * @Route("/new", name="annonce_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('annonce/public/createAnnonce.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="annonce_show", methods="GET")
     */
    public function show(Annonce $annonce): Response
    {
        return $this->render('annonce/public/show.html.twig', [
            'annonce' => $annonce
        ]);
    }

}
