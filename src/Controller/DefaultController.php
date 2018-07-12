<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/home", name="default")
     */
    public function index()
    {
        return $this->render('layout.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
