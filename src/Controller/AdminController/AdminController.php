<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 12/07/18
 * Time: 17:53
 */

namespace App\Controller\AdminController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin")
     */
    public function index()
    {
        return $this->render('layoutAdmin.html.twig');
    }
}