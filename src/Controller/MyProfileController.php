<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReviewRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegistrationFormType;
use App\Entity\User;

class MyProfileController extends AbstractController
{
    /**
     * @Route("my_profile", name="my_profile")
     */
    public function index(ReviewRepository $reviewRepository, PostRepository $postRepository): Response
    {
        // RECUP FUNCTION FINDBY (ALREADY EXISTING) of REVIEW REPO
        // RECUP THE USER IN THE ARRAY
        $allReview = $reviewRepository->findBy([
            'user'=>$this->getUser()
        ]);

        $allPost = $postRepository->findBy([
            'user'=>$this->getUser()
        ]);

        return $this->render('my_profile/index.html.twig', [
            'user'=>$this->getUser(),
            'allReview' => $allReview,
            // count = Compte tous les éléments d'un tableau ou quelque chose d'un objet
            //count(ALL THE REVIEW OF A USER)
            'countReview'=> count($allReview),
            'allPost' => $allPost,
            'countPost'=> count($allPost),
        ]);
    }

}
