<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("about", name="about")
     */
    public function about(): Response
    {

        $user = $this->getUser();

        return $this->render('home/about.html.twig', [
        ]);
    }

    /**
     * @Route("top_ten", name="top_ten")
     */
    public function topTen(): Response
    {

        $user = $this->getUser();

        return $this->render('home/top_ten.html.twig', [
        ]);
    }

    /**
     * @Route("find", name="find")
     */
    public function find(): Response
    {

        $user = $this->getUser();

        return $this->render('home/find.html.twig', [
        ]);
    }

    /**
     * @Route("my_profile", name="my_profile")
     */
    public function myprofile(): Response
    {

        $user = $this->getUser();

        return $this->render('home/my_profile.html.twig', [
        ]);
    }
}