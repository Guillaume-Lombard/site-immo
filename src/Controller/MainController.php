<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/aboutus", name="main_aboutus")
     */
    public function aboutUs(): Response
    {
        return $this->render('main/aboutUs.html.twig');
    }

    /**
     * @Route("/me", name="main_me")
     */
    public function me(): Response
    {
        return $this->render('main/me.html.twig');
    }
}
