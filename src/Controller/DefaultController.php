<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Tools\Pagination\Paginator;



class DefaultController extends Controller
{
    /**
     * @Route("/home/{page}/{title}", name="index")
     */
    public function index(int $page = 1, $title = null, AnnonceRepository $annoncesAr, Request $request): Response
    {
        $form = $this->createForm('App\Form\SearchType');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            return $this->redirectToRoute('index', [
                'title' => $data ['title'],
                'page' => 1,
            ]);
        }
        if ($title) {
            $annonces = $annoncesAr->findByLike($title, $page * 16 - 16);
            $nbAnnonces = count($annonces);
        } else{
            $annonces = $annoncesAr->findBy([], [], 16, $page * 16 - 16);
        $nbAnnonces = count($annonces);
        }

        return $this->render('homepage.html.twig', [
            'controller_name' => 'DefaultController',
            'annonces' => $annonces,
            'nbAnnonces' => $nbAnnonces,
            'form' => $form->createView(),
            'title' => $title,
            'page' => $page,
        ]);
    }

}
