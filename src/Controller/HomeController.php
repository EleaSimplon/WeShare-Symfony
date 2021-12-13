<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;
use App\Repository\ReviewRepository;
use App\Repository\UserRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'user'=>$this->getUser()
        ]);
    }

    /**
     * @Route("about", name="about")
     */
    public function about(PostRepository $postRepository, ReviewRepository $reviewRepository, UserRepository $userRepository): Response
    {
        // RECUP ALL POSTS TO DSPLAY THE COUNT
        $allPost = $postRepository->findAll();

        // RECUP ALL POSTS TO DSPLAY THE COUNT
        $allReview = $reviewRepository->findAll();

        $allUser = $userRepository->findAll();


        return $this->render('home/about.html.twig', [
            'allPost' => $allPost,
            'allReview' => $allReview,
            'allUser'=> $allUser
        ]);
    }


}